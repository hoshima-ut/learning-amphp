# learning-amphp
amphpを動かしてみます

## 開発の初め方

### 0. 前提条件
dockerをインストール済みであること<br>
https://docs.docker.jp/desktop/install.html

### 1. start

```bash
$ sh start.sh
```

http://localhost:8010/


### 2. composer install(初回のみ)

```bash
$ docker compose exec app bash
$ composer install
```

### 3. stop

```bash
$ sh stop.sh
```