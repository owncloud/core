import os, re, subprocess, json, collections
from sphinx.addnodes import toctree
from docutils import io, nodes, statemachine, utils
from docutils.parsers.rst import Directive
from jinja2 import Environment, PackageLoader

# Maintain a cache of previously loaded examples
example_cache = {}

# Maintain a cache of previously loaded service descriptions
description_cache = {}


def setup(app):
    """
    see: http://sphinx.pocoo.org/ext/appapi.html
    this is the primary extension point for Sphinx
    """
    from sphinx.application import Sphinx
    if not isinstance(app, Sphinx): return

    app.add_directive('service', ServiceIntro)
    app.add_directive('apiref', ServiceApiRef)
    app.add_directive('indexlinks', ServiceIndexLinks)
    app.add_directive('example', ExampleDirective)


class ServiceDescription():
    """
    Loads the service description for a given source file
    """

    def __init__(self, service):
        self.service_name = service
        self.description = self.load_description(self.determine_filename())

    def determine_filename(self):
        """Determines the filename to load for a service"""
        # Determine the path to the aws-config
        path = os.path.abspath("../src/Aws/Common/Resources/aws-config.php")
        self.config = self.__load_php(path)

        # Iterate over the loaded dictionary and see if a matching service exists
        for key in self.config["services"]:
            alias = self.config["services"][key].get("alias", "")
            if key == self.service_name or alias == self.service_name:
                break
        else:
            raise ValueError("No service matches %s" % (self.service_name))

        # Determine the name of the client class to load
        class_path = self.config["services"][key]["class"].replace("\\", "/")
        client_path = os.path.abspath("../src/" + class_path + ".php")
        contents = open(client_path, 'r').read()

        # Determine the current version of the client (look at the LATEST_API_VERSION constant value)
        version = re.search("LATEST_API_VERSION = '(.+)'", contents).groups(0)[0]

        # Determine the name of the service description used by the client
        matches = re.search("__DIR__ \. '/Resources/(.+)\.php'", contents)
        description = matches.groups(0)[0] % (version)

        # Strip the filename of the client and determine the description path
        service_path = "/".join(client_path.split(os.sep)[0:-1])
        service_path += "/Resources/" + description + ".php"

        return service_path

    def load_description(self, path):
        """Determines the filename to load for a service

        :param path: Path to a service description to load
        """
        description = self.__load_php(path)

        return description

    def __load_php(self, path):
        """Load a PHP script that returns an array using JSON

        :param path: Path to the script to load
        """
        path = os.path.abspath(path)

        # Make command to each environment Linux/Mac and Windows
        if os.name == 'nt':
            sh = 'php -r \"$c = include \'' + path + '\'; echo json_encode($c);\"'
        else:
            sh = 'php -r \'$c = include "' + path + '"; echo json_encode($c);\''

        loaded = subprocess.check_output(sh, shell=True)
        return json.loads(loaded)

    def __getitem__(self, i):
        """Allows access to the service description items via the class"""
        return self.description.get(i)


def load_service_description(name):
    if name not in description_cache:
        description_cache[name] = ServiceDescription(name)
    return description_cache[name]


class ServiceDescriptionDirective(Directive):
    """
    Base class for directives that use information from service descriptions
    """

    required_arguments = 1
    optional_arguments = 1
    final_argument_whitespace = True

    def run(self):
        if len(self.arguments) == 2:
            api_version = self.arguments[1].strip()
        else:
            api_version = ""
        service_name = self.arguments[0].strip()
        service_description = load_service_description(service_name)

        rawtext = self.generate_rst(service_description, api_version)
        tab_width = 4
        include_lines = statemachine.string2lines(
            rawtext, tab_width, convert_whitespace=1)
        self.state_machine.insert_input(
            include_lines, os.path.abspath(__file__))
        return []

    def get_service_doc_url(self, namespace):
        """Determine the documentation link for a service"""
        namespace = namespace.lower()
        if namespace == "sts":
            return "http://aws.amazon.com/documentation/iam/"
        else:
            return "http://aws.amazon.com/documentation/" + namespace

    def get_api_ref_url(self, namespace):
        """Determine the PHP API documentation link for a service"""
        return "http://docs.aws.amazon.com/aws-sdk-php/latest/class-Aws." + namespace + "." + namespace + "Client.html"

    def get_locator_name(self, name):
        """Determine the service locator name for an endpoint"""
        return name


class ServiceIntro(ServiceDescriptionDirective):
    """
    Creates a service introduction to inject into a document
    """

    def generate_rst(self, d, api_version):
        rawtext = ""
        scalar = {}

        # Grab all of the simple strings from the description
        for key in d.description:
            if isinstance(d[key], str) or isinstance(d[key], unicode):
                scalar[key] = d[key]
                # Add substitutions for top-level data in a service description
                rawtext += ".. |%s| replace:: %s\n\n" % (key, scalar[key])

        # Determine the doc URL
        docs = self.get_service_doc_url(d["namespace"])

        # Determine the "namespace" used for linking to API docs
        if api_version:
            apiVersionSuffix = "_" + api_version.replace("-", "_")
        else:
            apiVersionSuffix = ""

        env = Environment(loader=PackageLoader('aws', 'templates'))
        template = env.get_template("client_intro")
        rawtext += template.render(
            scalar,
            doc_url=docs,
            specifiedApiVersion=api_version,
            apiVersionSuffix=apiVersionSuffix)

        return rawtext


class ServiceApiRef(ServiceDescriptionDirective):
    """
    Inserts a formatted PHPUnit example into the source
    """

    def generate_rst(self, d, api_version):
        rawtext = ""
        scalar = {}
        # Sort the operations by key
        operations = collections.OrderedDict(sorted(d.description['operations'].items()))

        # Grab all of the simple strings from the description
        for key in d.description:
            if isinstance(d[key], str) or isinstance(d[key], unicode):
                scalar[key] = d[key]
                # Add substitutions for top-level data in a service description
                rawtext += ".. |%s| replace:: %s\n\n" % (key, scalar[key])

        # Add magic methods to each operation
        for key in operations:
            operations[key]['magicMethod'] = key[0].lower() + key[1:]

        # Set the ordered dict of operations on the description
        d.description['operations'] = operations

        # Determine the "namespace" used for linking to API docs
        if api_version:
            apiVersionSuffix = "_" + api_version.replace("-", "_")
        else:
            apiVersionSuffix = ""

        env = Environment(loader=PackageLoader('aws', 'templates'))
        template = env.get_template("api_reference")
        rawtext += template.render(
            scalar,
            description=d.description,
            apiVersionSuffix=apiVersionSuffix)

        return rawtext


class ServiceIndexLinks(ServiceDescriptionDirective):
    """
    Inserts a formatted PHPUnit example into the source
    """

    def generate_rst(self, service_description, api_version):
        d = service_description.description

        service_name = d["serviceFullName"]
        if "serviceAbbreviation" in d:
            service_name = d["serviceAbbreviation"]

        rawtext = "* :doc:`Using the " + service_name + " PHP client <service-" + d["namespace"].lower() + ">`\n";
        rawtext += "* `PHP API reference <" + self.get_api_ref_url(d["namespace"]) + ">`_\n";
        #rawtext += "* `General service documentation for " + service_name + " <" + self.get_service_doc_url(d["namespace"]) + ">`_\n";

        return rawtext


class ExampleDirective(Directive):
    """
    Inserts a formatted PHPUnit example into the source
    """

    # Directive configuration
    required_arguments = 2
    optional_arguments = 0
    final_argument_whitespace = True

    def run(self):
        self.end_function = "    }\n"
        self.begin_tag = "        // @begin\n"
        self.end_tag = "        // @end\n"

        example_file = self.arguments[0].strip()
        example_name = self.arguments[1].strip()

        if not example_name:
            raise ValueError("Must specify both an example file and example name")

        contents = self.load_example(example_file, example_name)
        rawtext = self.generate_rst(contents)
        tab_width = 4
        include_lines = statemachine.string2lines(
            rawtext, tab_width, convert_whitespace=1)
        self.state_machine.insert_input(
            include_lines, os.path.abspath(__file__))
        return []

    def load_example(self, example_file, example_name):
        """Loads the contents of an example and strips out non-example parts"""
        key = example_file + '.' + example_name

        # Check if this example is cached already
        if key in example_cache:
            return example_cache[key]

        # Not cached, so index the example file functions
        path = os.path.abspath(__file__ + "/../../../../tests/Aws/Tests/" + example_file)

        f = open(path, 'r')
        in_example = False
        capturing = False
        buffer = ""

        # Scan each line of the file and create example hashes
        for line in f:
            if in_example:
                if line == self.end_function:
                    if in_example:
                        example_cache[in_example] = buffer
                    buffer = ""
                    in_example = False
                elif line == self.begin_tag:
                    # Look for the opening // @begin tag to begin capturing
                    buffer = ""
                    capturing = True
                elif line == self.end_tag:
                    # Look for the optional closing tag to stop capturing
                    capturing = False
                elif capturing:
                    buffer += line
            elif "public function test" in line:
                # Grab the function name from the line and keep track of the
                # name of the current example being captured
                current_name = re.search('function (.+)\s*\(', line).group(1)
                in_example = example_file + "." + current_name
        f.close()
        return example_cache[key]

    def generate_rst(self, contents):
        rawtext = ".. code-block:: php\n\n" + contents
        return rawtext
