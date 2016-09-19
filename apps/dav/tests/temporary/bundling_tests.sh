#!/bin/bash

script_path="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

user='admin'
pass='admin'
server='localhost:8080'
upload="/tmp/upload.txt"

testfile0="/tmp/test.txt"
echo -en "abcd" > $testfile0
size0=$(du -sb $testfile0 | awk '{ print $1 }')
md50=$(md5sum $testfile0 | awk '{ print $1 }')

testfile1="$script_path/bundling_tests.sh"
size1=$(du -sb $testfile1 | awk '{ print $1 }')
md51=$(md5sum $testfile1 | awk '{ print $1 }')

testfile2="$script_path/zombie.jpg"
size2=$(du -sb $testfile2 | awk '{ print $1 }')
md52=$(md5sum $testfile2 | awk '{ print $1 }')

mdupload=$(md5sum $upload | awk '{ print $1 }')
boundrary="boundary_$mdupload"

#CONTENTS
echo -en "--$boundrary\r\nX-OC-Method: PUT\r\nX-OC-Path: test/test.txt\r\nX-OC-Mtime: 1471254375\r\nContent-length: $size0\r\nContent-MD5: $md50\r\n\r\n" > $upload
cat $testfile0 >> $upload

echo -en "\r\n--$boundrary\r\nX-OC-Method: PUT\r\nX-OC-Path: bundling_tests.sh\r\nX-OC-Mtime: 1471254475\r\nContent-length: $size1\r\nContent-MD5: $md51\r\n\r\n" >> $upload
cat $testfile1 >> $upload

echo -en "\r\n--$boundrary\r\nX-OC-Method: PUT\r\nX-OC-Path: test/zombie1.jpg\r\nX-OC-Mtime: 1471254275\r\nContent-length: $size2\r\nContent-MD5: $md52\r\n\r\n" >> $upload
cat $testfile2 >> $upload

#END BOUNDRARY
echo -en "\r\n--$boundrary--\r\n" >> $upload

#POST
#curl -X DELETE -u $user:$pass --cookie "XDEBUG_SESSION=MROW4A;path=/;" "http://$server/remote.php/webdav/config.cfg"

curl -X POST -H "Content-Type: multipart/mixed; boundary=$boundrary" --cookie "XDEBUG_SESSION=MROW4A;path=/;" \
    --data-binary "@$upload" \
    "http://$user:$pass@$server/remote.php/dav/files/$user"




