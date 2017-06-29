#!/bin/bash

script_path="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

user='admin'
pass='admin'
server='localhost:8080/owncloud'
upload="/tmp/upload.txt"


testfile1="$script_path/put_test.sh"
size1=$(du -sb $testfile1 | awk '{ print $1 }')
md51=$(md5sum $testfile1 | awk '{ print $1 }')
id1="0"

testfile2="$script_path/zombie.jpg"
size2=$(du -sb $testfile2 | awk '{ print $1 }')
md52=$(md5sum $testfile2 | awk '{ print $1 }')
id2="1"

header="<?xml version='1.0' encoding='UTF-8'?>\n
<d:multipart xmlns:d=\"DAV:\">\n
    <d:part>\n
        <d:prop>\n
            <d:oc-path>/put_test.sh</d:oc-path>\n
            <d:oc-mtime>1476393777</d:oc-mtime>\n
            <d:oc-id>$id1</d:oc-id>\n
            <d:oc-total-length>$size1</d:oc-total-length>\n
        </d:prop>\n
    </d:part>\n
    <d:part>\n
        <d:prop>\n
            <d:oc-path>/test/zombie.jpg</d:oc-path>\n
            <d:oc-mtime>1476393386</d:oc-mtime>\n
            <d:oc-id>$id2</d:oc-id>\n
            <d:oc-total-length>$size2</d:oc-total-length>\n
        </d:prop>\n
    </d:part>\n
</d:multipart>"
headersize=$(echo -en $header | wc -c)

mdupload=$(md5sum $upload | awk '{ print $1 }')
boundrary="boundary_$mdupload"

#CONTENTS
echo -en "--$boundrary\r\nContent-Type: text/xml; charset=utf-8\r\nContent-Length: $headersize\r\n\r\n" > $upload
echo -en $header >> $upload

echo -en "\r\n--$boundrary\r\nContent-ID: $id1\r\n\r\n" >> $upload
cat $testfile1 >> $upload

echo -en "\r\n--$boundrary\r\nContent-ID: $id2\r\n\r\n" >> $upload
cat $testfile2 >> $upload

#END BOUNDRARY
echo -en "\r\n--$boundrary--\r\n" >> $upload

#POST
#curl -X DELETE -u $user:$pass --cookie "XDEBUG_SESSION=MROW4A;path=/;" "http://$server/remote.php/webdav/config.cfg"

curl -X POST -H "Content-Type: multipart/related; boundary=$boundrary" --cookie "XDEBUG_SESSION=MROW4A;path=/;" \
    --data-binary "@$upload" \
    "http://$user:$pass@$server/remote.php/dav/files/$user"




