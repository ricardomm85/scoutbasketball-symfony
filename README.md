
# Bring up the project

- `docker-compose up`
- Web: http://localhost:11001/
- Access PHP container: `docker exec -it scoutbasketball-symfony-2022-php bash`

# Xdebug

- Chrome extension: https://chrome.google.com/webstore/detail/xdebug-helper/eadndfjplgieldjbigjakmdgkmoaaaoc
- If you see `NOTICE: PHP message: Xdebug: [Step Debug] Could not connect to debugging client. Tried: 172.18.0.1:9003 (from REMOTE_ADDR HTTP header), localhost:9003 (fallback through xdebug.client_host/xdebug.client_port) :-(`
  it means that the extension is sending a debug request,
  but you haven't started "listening" for it yet in PHPStorm.
