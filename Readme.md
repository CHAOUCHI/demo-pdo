# Start docker mysql container
```bash
docker run --name bdd -e MYSQL_DATABASE=demo -e MYSQL_ROOT_PASSWORD=root -p 3306:3306 -d mysql:latest
```

# Accessing the database
```bash
mysql -h127.0.0.1 -uroot -p --database=demo
```