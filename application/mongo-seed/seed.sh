#! /bin/bash

mongoimport --host mongodb --db MyDatabase --collection MyCollection --type json --file ./init.json --jsonArray