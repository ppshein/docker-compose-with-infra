<?php

$db_host = getenv('MONGO_HOST', true) ?: getenv('MONGO_HOST');
$db_user = getenv('MONGO_USERNME', true) ?: getenv('MONGO_USERNME');
$db_pwd  = getenv('MONGO_PASSWORD', true) ?: getenv('MONGO_PASSWORD');
$db_name  = getenv('MONGO_DATABASE', true) ?: getenv('MONGO_DATABASE');
$db_collection  = getenv('MONGO_COLLECTION', true) ?: getenv('MONGO_COLLECTION');

$connection = new MongoClient( "mongodb://$db_host:27017" );

?>