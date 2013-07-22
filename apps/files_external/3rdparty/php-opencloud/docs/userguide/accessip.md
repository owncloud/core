About the Access IP Addresses
=============================

OpenStack deployments generally provide new [servers](servers.md) with one
or two network interfaces, each with its own address(es). Usually, one of
these will be a public interface, with its addresses available on the Internet.

However, in some cases, the servers are created on an internal network
(this is especially common in a hybrid solution where physical and virtual
servers are intermixed). The servers may be behind a NAT device, firewall,
or other network device that prohibits direct access to the server itself.

The `Server` object provides two attributes that are used to instruct
applications what IP address to use. These are called the *access IP*
addresses, and they are, in essence, documentation strings used to
direct applications to the correct network address. They can be changed
at will by the server's owner, and OpenStack Nova does not perform any
validation on them:

* `accessIPv4` holds the IPv4 access address, and
* `accessIPv6` holds the IPv6 access address.

### Updating the access IP address(es)

For example, you may have a private cloud with internal addresses in the
10.1.x range. However, you can access a server via a firewall device at
address 50.57.94.244. In this case, you can change the `accessIPv4` attribute
to point to the firewall:

    $compute = $cloud->Compute();
    $server = $compute->Server('908c5617-26c2-4535-99a9-3f20e4b74835');
    $server->Update(array('accessIPv4'=>'50.57.94.244'));

When a client application retrieves the server's information, it will know
that it needs to use the `accessIPv4` address to connect to the server, and
*not* the IP address assigned to one of the network interfaces.

### Retrieving the server's IP address

The `Server::ip()` method is used to retrieve the server's IP address.
It has one optional parameter: the format (either IPv4 or IPv6) of the address
to return (by default, it returns the IPv4 address):

	$server = $compute->Server('...');	// get a server
	print $server->ip();				// the IPv4 address
	print $server->ip(4);				// the IPv4 address, too
	print $server->ip(6);				// the IPv6 address
	print $server->ip(8);				// causes an exception

## What next?

Return to the [Table of Contents](toc.md)
