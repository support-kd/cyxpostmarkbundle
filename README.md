Post Mark Bundle
======================

This bundle integrates Post Mark API in Symfony.

- [Post Mark Bundle](#post-mark-bundle)
    - [1. Installation](#1-installation)
    - [2. Configuration](#2-configuration)
    - [3. Usage](#3-usage)
      - [3.1: Send Email](#31-send-email)
      - [3.2: Send Email With Template](#32-send-email-with-template)

### 1. Installation

Add Tron Repository in symfony composer

``` json
# composer

"repositories": [
        {"type": "vcs", "url": "https://github.com/support-kd/cyxpostmarkbundle"}
    ],
```

Run from terminal:

```bash
$ composer require SupportKd/CyxPostMarkBundle
```

Enable bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = [
        // ...
        new SupportKd\CyxPostMarkBundle\CyxPostMarkBundle(),
    ];
}
```

### 2. Configuration

Add following lines in your configuration:

``` yaml
# app/config/config.yml

cyx_post_mark:
    account_api_token: "%account_api_token%"
    sender_signature: "%sender_signature%"
    verify_ssl: "%postmark_verify_ssl%"
    sandbox_mode: <TRUE or FALSE><default FALSE>
    sandbox_email: <emailId>
```


### 3. Usage

[Check out document](https://github.com/wildbit/postmark-php/wiki/Getting-Started) to get started using Postmark-PHP now

#### 3.1: Send Email

``` php
#include PostMarkModel in your Controller

$postMark = new PostMarkModel($this->container);
$sendResult = $postMark->sendEmail($toEmail,$subject, $htmlBody = NULL, $textBody = NULL, $tag = NULL, $trackOpens = true, $replyTo = NULL, $cc = NULL, $bcc = NULL, $headers = NULL, $attachments = NULL, $trackLinks = NULL);
```

#### 3.2: Send Email With Template

``` php
#include PostMarkModel in your Controller

$postMark = new PostMarkModel($this->container);
// Make a request
$sendResult = $postMark->sendEmailWithTemplate(
  "recipient@example.com",
  <template-id>,
  ["name" => "John Smith"],
);
```
