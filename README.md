<img src="https://github.com/nilava/alexa_smart_home_device_discovery/raw/master/res/ss.png" alt="screenshot"/>

**Cloud torrent** is a a self-hosted remote torrent client, written in Go (golang). You start torrents remotely, which are downloaded as sets of files on the local disk of the server, which are then retrievable or streamable via HTTP.

### Features

* Single binary
* Cross platform
* Embedded torrent search
* Real-time updates
* Mobile-friendly
* Fast [content server](http://golang.org/pkg/net/http/#ServeContent)

See [Future Features here](#future-features)

### Install

<a href="https://github.com/nilava/alexa_smart_home_device_discovery/releases/latest" alt="Downloads">
        <img src="https://img.shields.io/github/downloads/nilava/alexa_smart_home_device_discovery/total.svg" /></a>

See [the latest release](https://github.com/nilava/alexa_smart_home_device_discovery/releases/latest).



**VPS**

[Digital Ocean](https://m.do.co/c/011fa87fde07)

  1. [Sign up with free $10 credit](https://m.do.co/c/011fa87fde07)
  2. "Create Droplet"
  3. "One-Click Apps"
  4. "Docker X.X.X on X.X"
  5. Choose server size ("$5/month" is enough)
  6. Choose server location
  7. **OPTIONAL** Add your SSH key
  8. "Create"
  9. You will be emailed the server details (`IP Address: ..., Username: root, Password: ...`)
  10. SSH into the server using these details (Windows: [Putty](https://the.earth.li/~sgtatham/putty/latest/x86/putty.exe), Mac: Terminal)
  11. Follow the prompts to set a new password
  12. Run `cloud-torrent` with:

    docker run --name ct -d -p 63000:63000 \
      --restart always \
      -v /root/downloads:/downloads \
      jpillora/cloud-torrent --port 63000

  13. Visit `http://<IP Address from email>:63000/`
  14. **OPTIONAL** In addition to `--port` you can specify the options below

[Vultr](http://www.vultr.com/?ref=6947403-3B)

* [Sign up with free $10 credit here](http://www.vultr.com/?ref=6947403-3B)
* Follow the DO tutorial above, very similar steps ("Applications" instead of "One-Click Apps")
* Offers different server locations

[AWS](https://aws.amazon.com)

**Heroku**

[![Deploy](https://www.herokucdn.com/deploy/button.svg)](https://heroku.com/deploy)


#### Donate

If you'd like to buy me a coffee or more, you can donate via [PayPal](https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=dev%40jpillora%2ecom&lc=AU&item_name=Open%20Source%20Donation&button_subtype=services&currency_code=USD&bn=PP%2dBuyNowBF%3abtn_buynowCC_LG%2egif%3aNonHosted) or BitCoin `1AxEWoz121JSC3rV8e9MkaN9GAc5Jxvs4`.


Copyright (c) 2019 Nilava Chowdhury
