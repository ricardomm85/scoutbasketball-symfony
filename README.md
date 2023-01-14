[![Coverage Badge](https://img.shields.io/endpoint?url=https://gist.githubusercontent.com/ricardomm85/0c1f8403decd5753c549451042d2c952/raw/scoutbasketball-symfony-coverage.json)](https://gist.github.com/ricardomm85/0c1f8403decd5753c549451042d2c952)
[![Build Status](https://github.com/ricardomm85/scoutbasketball-symfony/workflows/CI/badge.svg)](https://github.com/ricardomm85/scoutbasketball-symfony/actions)

# Bring up the project
- `docker-compose up`
- Web: http://localhost:11001/

# Database
- `symfony console make:migration`
- `symfony console doctrine:migrations:migrate`
- Create factory:
  - symfony console make:factory
  - symfony console doctrine:fixtures:load

# Xdebug
- Chrome extension: https://chrome.google.com/webstore/detail/xdebug-helper/eadndfjplgieldjbigjakmdgkmoaaaoc
- If you see `NOTICE: PHP message: Xdebug: [Step Debug] Could not connect to debugging client. Tried: 172.18.0.1:9003 (from REMOTE_ADDR HTTP header), localhost:9003 (fallback through xdebug.client_host/xdebug.client_port) :-(`
  it means that the extension is sending a debug request,
  but you haven't started "listening" for it yet in PHPStorm.
