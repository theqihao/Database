#!/bin/bash

cd ..
cp -r html/* Database
cd Database


echo $*
git add *
git commit * -m "$*"
git push origin master
