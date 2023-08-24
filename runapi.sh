#!/bin/bash

testapi="$1"
deploy="$2"

if [ "$deploy" = "ConnectToAPI" ] || [ "$testapi" = "ConnectToAPI" ]; then
  npm run kill
  npm run deploy
elif [ "$deploy" = "ConnectToDb" ] || [ "$testapi" = "ConnectToDb" ]; then
  npm run kill
  npm run stopdeploy
elif [ "$testapi" = "ConnectToAPI" ] && [ "$deploy" = "" ]; then
  npm run kill
  npm run stopdeploy
else
  npm run kill
  npm run stopdeploy
fi
