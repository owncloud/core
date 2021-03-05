# Copyright 2020 Google LLC
#
# Licensed under the Apache License, Version 2.0 (the "License");
# you may not use this file except in compliance with the License.
# You may obtain a copy of the License at
#
#     http://www.apache.org/licenses/LICENSE-2.0
#
# Unless required by applicable law or agreed to in writing, software
# distributed under the License is distributed on an "AS IS" BASIS,
# WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
# See the License for the specific language governing permissions and
# limitations under the License.

"""This script is used to synthesize generated parts of this library."""

import synthtool as s
from synthtool.__main__ import extra_args
from synthtool import log, shell
from synthtool.sources import git
import logging
from os import path, remove
from pathlib import Path
import glob
import json
import re
import sys
from packaging import version

logging.basicConfig(level=logging.DEBUG)

VERSION_REGEX = r"([^\.]*)\.(.+)\.json$"

TEMPLATE_VERSIONS = [
    "default",
]
discovery_url = "https://github.com/googleapis/discovery-artifact-manager.git"

repository = Path('.')

log.debug(f"Cloning {discovery_url}.")
discovery = git.clone(discovery_url)

log.debug("Cleaning output directory.")
shell.run("rm -rf .cache".split(), cwd=repository)

log.debug("Installing dependencies.")
shell.run(
    "python2 -m pip install -e generator/ --user".split(),
    cwd=repository
)

def generate_service(disco: str):
    m = re.search(VERSION_REGEX, disco)
    name = m.group(1)
    version = m.group(2)
    template = TEMPLATE_VERSIONS[-1] # Generate for latest version

    log.info(f"Generating {name} {version} ({template}).")

    output_dir = repository / ".cache" / name / version
    input_file = discovery / "discoveries" / disco

    command = (
        f"python2 -m googleapis.codegen --output_dir={output_dir}" +
        f" --input={input_file} --language=php --language_variant={template}" +
        f" --package_path=api/services"
    )

    shell.run(f"mkdir -p {output_dir}".split(), cwd=repository / "generator")
    shell.run(command.split(), cwd=repository, hide_output=False)

    s.copy(output_dir, f"src/Google/Service")

def all_discoveries(skip=None, prefer=None):
    """Returns a map of API IDs to Discovery document filenames.

    Args:
        skip (list, optional): a list of API IDs to skip.
        prefer (list, optional): a list of API IDs to include.

    Returns:
        list(string): A list of Discovery document filenames.
    """
    discos = {}
    for file in sorted(glob.glob(str(discovery / 'discoveries/*.*.json'))):
        api_id = None
        with open(file) as api_file:
            api_id = json.load(api_file)['id']
        # If an API has already been visited, skip it.
        if api_id in discos:
            continue
        # Skip APIs explicitly listed in "skip" arg
        if skip and api_id in skip:
            continue
        discos[api_id] = path.basename(file)

    # Skip APIs not preferred in index.json and not listed in "prefer" arg
    index = {}
    with open(str(discovery / 'discoveries/index.json')) as file:
        index = json.load(file)
    for api in index['items']:
        api_id = api['id']
        if prefer and api_id in prefer:
            continue
        if api['preferred']:
            continue
        discos.pop(api_id, None)

    return discos.values()

def generate_services(services):
    for service in services:
        generate_service(service)

skip = ['discovery:v1', 'websecurityscanner:v1']
prefer = ['admin:directory_v1', 'admin:datatransfer_v1']
discoveries = all_discoveries(skip, prefer)
generate_services(discoveries)
