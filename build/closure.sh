#! /bin/bash

if [ "$#" -ne 2 ]
then
  echo "Usage: bash closure.sh <closure.jar> <js dir/file>"
  exit 1
fi

COMPILER=$1
DIR=$2

ERRORS=0
WARNINGS=0

for FILE in `find $DIR -type f -name \*.js`
do
    echo "Checking: $FILE"
    java -jar $COMPILER --checks-only $FILE
    case "$?" in
        1)
            echo "Error(s) in $FILE"
            ((ERRORS++))
            ;;
        2)
            echo "Warning(s) in $FILE"
            ((WARNINGS++))
            ;;
    esac
done

echo
echo "$ERRORS file(s) contain errors"
echo "$WARNINGS files(s) contain warnings"

if [ $ERRORS -ne 0 ]
then
    exit 2
fi
