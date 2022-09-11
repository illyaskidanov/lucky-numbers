<h1 align="center">Lucky Numbers 🎲</h1>


REQUIREMENTS
------------
* Docker & Docker Compose
* Make

INSTALLATION
------------

### Install via Make

First you need to build the project
```
make build
```
After you should to run docker environment
```
make run
```
Finnaly change permissions on `./web/assets` folder
```
sudo chgrp www-data ./web/assets
sudo chmod g+w ./web/assets
```
Now project accessible at `http://localhost:8000`

Also you can run tests
```
make tests
```

Enjoy!