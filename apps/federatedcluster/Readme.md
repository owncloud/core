Federated Cluster
=================

Distribute requests for a single ownCloud URL over multiple ownCloud instances.


Architecture
------------

### Login 

A load balancer like haproxy is used to direct http requests to separate
ownCloud Installations, based on a cookie. Upon login the cookie is set by
ownCloud to make subsequent requests directly reach the correct ownCloud instance.


### Internal Sharing

Sharing between instances is handled by the existing federated sharing mechanism.
Some changes to core are required to make federation aware of members of the
federated cluster so cluster internal hosts names are used to establish the share
but are not exposed to the end user.
- [ ] sharing ui: remove server name, make it look like normal share
- [ ] share notification on recipient side: remove server name from sharer id
- [ ] Requires CORE branch/PR
- [ ] make hosts / user map configurable? query redis or other nodes?
- [ ] where should the Cluster class go? core?
    - [ ] fix DI for it


### Public sharing

Links need to be unique over all instances and the haproxy needs to be able to
choose the right server based on the link token. For this redis is used to store
a map of link token to cluster node. It can be used for both: checking if a link
already exists as well as finding the right host. A fallback mechanism based on
cookies has been implemented
- [ ] occ command to repopulate redis with mapping?
- [ ] check link uniqueness, overwrite token until it is unique


Implementation
--------------

### haproxy

haproxy.conf excerpt:
```
frontend localnodes
    bind *:443 ssl crt /etc/ssl/localcerts/bpicln01.pem
    mode http

    acl is_ocnode1 hdr_sub(cookie) SRVNAME=node1
        use_backend ocnode1 if is_ocnode1

    acl is_ocnode2 hdr_sub(cookie) SRVNAME=node2
        use_backend ocnode2 if is_ocnode2

    # if no cookie is set start anywhere
    default_backend ocnodes

backend ocnodes
    mode http
    balance roundrobin
    option forwardfor
    http-request set-header X-Forwarded-Port %[dst_port]
    http-request add-header X-Forwarded-Proto https if { ssl_fc }
    server ochost1 host1:80
    server ochost2 host2:80
    
backend ocnode1
    mode http
    option forwardfor
    http-request set-header X-Forwarded-Port %[dst_port]
    http-request add-header X-Forwarded-Proto https if { ssl_fc }
    server ochost1 host1:80

backend ocnode2
    mode http
    option forwardfor
    http-request set-header X-Forwarded-Port %[dst_port]
    http-request add-header X-Forwarded-Proto https if { ssl_fc }
    server ochost2 host2:80
```

### Federated Cluster App
To respond to a login request with a correct session and node cookie the
Federated Cluster app implements a user backend that tries to log in the user at
the other nodes. The default login url /index.php/login requires a CSRF check so
the app also provides a dedicated login url for this 'inter node login'.

### Core branch
The app needs the `stable9.1-federated-cluster` branch.