
# scaffoldings
app' scaffoldings put together instead of constantly reusing bits and pieces from former projects (which is time-consuming)

## prerequisites
* having Docker installed on your machine

## how-to
1. in your terminal, go inside the folder of an app', for instance ***PHP_apps/apache_php_bare_essentials***
2. run ```docker compose up``` 
3. wait until you see the names of your services (referenced in a ***docker-compose.yml*** file) in your terminal, meaning that they are running, also verify that they have not exited for some reason
4. go to http://localhost (only for web apps)
