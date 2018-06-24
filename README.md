#### For running project
* `docker-compose up`
* `docker exec -it <php-container-name | id> bash`
* `bash ./build.sh`

#### Services
* `http://localhost/` - application
* `http://localhost/rest` - rest endpoint
* `http://localhost:8080/` - swagger doc
* `http://localhost:5601/` - kibana service (for elasticsearch)
* details in `docker-compose.yml`

#### For index manipulation in Elasticsearch
* Create `php yii php yii elasticsearch/create-index`
* Delete `php yii php yii elasticsearch/create-delete`
