--TEST--
Testing: suhosin.mail.protect=2 and extra headers contain Cc:
--SKIPIF--
<?php include "../skipifnotcli.inc"; ?>
--INI--
suhosin.log.sapi=255
suhosin.log.stdout=0
suhosin.log.script=0
suhosin.log.syslog=0
suhosin.mail.protect=2
sendmail_path=/usr/bin/true
--FILE--
<?php
	var_dump(mail("to", "subject", "msg", "Cc: me"));
?>
--EXPECTF--
ALERT - mail() - CC: headers aren't allowed in the headers parameter. (attacker 'REMOTE_ADDR not set', file '%s', line 2)
bool(false)