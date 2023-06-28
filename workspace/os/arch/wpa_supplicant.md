# 无线连接 wpa_supplicant
配置可参考：

```linux
//WPA-PSK，PSK作为ASCII密码，允许所有有效密码
network={
	ssid="simple"
	psk="very secret passphrase"
	priority=5
}

//与之前相同，但请求SSID特定扫描（对于拒绝广播SSID的AP）
network={
	ssid="second ssid"
	scan_ssid=1
	psk="very secret passphrase"
	priority=2
}

//仅使用WPA-PSK。 任何有效的密码组合都被接受。
network={
	ssid="example"
	proto=WPA
	key_mgmt=WPA-PSK
	pairwise=CCMP TKIP
	group=CCMP TKIP WEP104 WEP40
	psk=06b4be19da289f475aa46a33cb793029d4ab3db7a23ee92382eb0106c72ac7bb
	priority=2
}

//具有TKIP的WPA-Personal（PSK）和用于频繁PTK密钥更新的强制执行
network={
	ssid="example"
	proto=WPA
	key_mgmt=WPA-PSK
	pairwise=TKIP
	group=TKIP
	psk="not so secure passphrase"
	wpa_ptk_rekey=600
}

//仅使用WPA-EAP。 CCMP和TKIP都被接受。 使用WEP104或WEP40作为组密码的AP将不被接受。
network={
	ssid="example"
	proto=RSN
	key_mgmt=WPA-EAP
	pairwise=CCMP TKIP
	group=CCMP TKIP
	eap=TLS
	identity="user@example.com"
	ca_cert="/etc/cert/ca.pem"
	client_cert="/etc/cert/user.pem"
	private_key="/etc/cert/user.prv"
	private_key_passwd="password"
	priority=1
}

//使用新peaplabel的RADIUS服务器的＃EAP-PEAP / MSCHAPv2配置
network={
	ssid="example"
	key_mgmt=WPA-EAP
	eap=PEAP
	identity="user@example.com"
	password="foobar"
	ca_cert="/etc/cert/ca.pem"
	phase1="peaplabel=1"
	phase2="auth=MSCHAPV2"
	priority=10
}

//EAP-TTLS / EAP-MD5-具有匿名身份的挑战配置，用于未加密的使用。 仅在加密的TLS隧道内发送实际身份。
network={
	ssid="example"
	key_mgmt=WPA-EAP
	eap=TTLS
	identity="user@example.com"
	anonymous_identity="anonymous@example.com"
	password="foobar"
	ca_cert="/etc/cert/ca.pem"
	priority=2
}

//EAP-TTLS / MSCHAPv2配置，具有未加密使用的匿名标识。 仅在加密的TLS隧道内发送实际身份。
network={
	ssid="example"
	key_mgmt=WPA-EAP
	eap=TTLS
	identity="user@example.com"
	anonymous_identity="anonymous@example.com"
	password="foobar"
	ca_cert="/etc/cert/ca.pem"
	phase2="auth=MSCHAPV2"
}

//WPA-EAP，EAP-TTLS，具有用于外部和内部身份验证的不同CA证书。
network={
	ssid="example"
	key_mgmt=WPA-EAP
	eap=TTLS
	# Phase1 / outer authentication
	anonymous_identity="anonymous@example.com"
	ca_cert="/etc/cert/ca.pem"
	# Phase 2 / inner authentication
	phase2="autheap=TLS"
	ca_cert2="/etc/cert/ca2.pem"
	client_cert2="/etc/cer/user.pem"
	private_key2="/etc/cer/user.prv"
	private_key2_passwd="password"
	priority=2
}

//PWA-PSK和WPA-EAP都被接受。 只有CCMP被接受为成对和组密码。
network={
	ssid="example"
	bssid=00:11:22:33:44:55
	proto=WPA RSN
	key_mgmt=WPA-PSK WPA-EAP
	pairwise=CCMP
	group=CCMP
	psk=06b4be19da289f475aa46a33cb793029d4ab3db7a23ee92382eb0106c72ac7bb
}

//SSID中的特殊字符，因此请使用十六进制字符串。 默认为WPA-PSK，WPA-EAP
# and all valid ciphers.
network={
	ssid=00010203
	psk=000102030405060708090a0b0c0d0e0f101112131415161718191a1b1c1d1e1f
}


//EAP-SIM，带有GSM SIM或USIM
network={
	ssid="eap-sim-test"
	key_mgmt=WPA-EAP
	eap=SIM
	pin="1234"
	pcsc=""
}


//EAP-PSK
network={
	ssid="eap-psk-test"
	key_mgmt=WPA-EAP
	eap=PSK
	anonymous_identity="eap_psk_user"
	password=06b4be19da289f475aa46a33cb793029
	identity="eap_psk_user@example.com"
}


//IEEE 802.1X / EAPOL，使用EAP-TLS动态生成WEP密钥（即无WPA）进行身份验证和密钥生成; 需要单播和广播WEP密钥。
network={
	ssid="1x-test"
	key_mgmt=IEEE8021X
	eap=TLS
	identity="user@example.com"
	ca_cert="/etc/cert/ca.pem"
	client_cert="/etc/cert/user.pem"
	private_key="/etc/cert/user.prv"
	private_key_passwd="password"
	eapol_flags=3
}


//LEAP与动态WEP密钥
network={
	ssid="leap-example"
	key_mgmt=IEEE8021X
	eap=LEAP
	identity="user"
	password="foobar"
}

//EAP-IKEv2使用共享机密进行服务器和对等身份验证
network={
	ssid="ikev2-example"
	key_mgmt=WPA-EAP
	eap=IKEV2
	identity="user"
	password="foobar"
}

# EAP-FAST with WPA (WPA or WPA2)
network={
	ssid="eap-fast-test"
	key_mgmt=WPA-EAP
	eap=FAST
	anonymous_identity="FAST-000102030405"
	identity="username"
	password="password"
	phase1="fast_provisioning=1"
	pac_file="/etc/wpa_supplicant.eap-fast-pac"
}

network={
	ssid="eap-fast-test"
	key_mgmt=WPA-EAP
	eap=FAST
	anonymous_identity="FAST-000102030405"
	identity="username"
	password="password"
	phase1="fast_provisioning=1"
	pac_file="blob://eap-fast-pac"
}

//明文连接（没有WPA，没有IEEE 802.1X）
network={
	ssid="plaintext-test"
	key_mgmt=NONE
}


//共享WEP密钥连接（无WPA，无IEEE 802.1X）
network={
	ssid="static-wep-test"
	key_mgmt=NONE
	wep_key0="abcde"
	wep_key1=0102030405
	wep_key2="1234567890123"
	wep_tx_keyidx=0
	priority=5
}


//使用共享密钥IEEE 802.11身份验证的共享WEP密钥连接（无WPA，无IEEE 802.1X）
network={
	ssid="static-wep-test2"
	key_mgmt=NONE
	wep_key0="abcde"
	wep_key1=0102030405
	wep_key2="1234567890123"
	wep_tx_keyidx=0
	priority=5
	auth_alg=SHARED
}


//具有RSN的IBSS / ad-hoc网络
network={
	ssid="ibss-rsn"
	key_mgmt=WPA-PSK
	proto=RSN
	psk="12345678"
	mode=1
	frequency=2412
	pairwise=CCMP
	group=CCMP
}

//具有WPA-None / TKIP的IBSS / ad-hoc网络（已弃用）
network={
	ssid="test adhoc"
	mode=1
	frequency=2412
	proto=WPA
	key_mgmt=WPA-NONE
	pairwise=NONE
	group=TKIP
	psk="secret passphrase"
}

//开放式网状网络
network={
	ssid="test mesh"
	mode=5
	frequency=2437
	key_mgmt=NONE
}

//安全（SAE + AMPE）网络
network={
	ssid="secure mesh"
	mode=5
	frequency=2437
	key_mgmt=SAE
	psk="very secret passphrase"
}


//捕获允许或多或少所有配置模式的所有示例
network={
	ssid="example"
	scan_ssid=1
	key_mgmt=WPA-EAP WPA-PSK IEEE8021X NONE
	pairwise=CCMP TKIP
	group=CCMP TKIP WEP104 WEP40
	psk="very secret passphrase"
	eap=TTLS PEAP TLS
	identity="user@example.com"
	password="foobar"
	ca_cert="/etc/cert/ca.pem"
	client_cert="/etc/cert/user.pem"
	private_key="/etc/cert/user.prv"
	private_key_passwd="password"
	phase1="peaplabel=0"
}

//带智能卡的EAP-TLS示例（openssl引擎）
network={
	ssid="example"
	key_mgmt=WPA-EAP
	eap=TLS
	proto=RSN
	pairwise=CCMP TKIP
	group=CCMP TKIP
	identity="user@example.com"
	ca_cert="/etc/cert/ca.pem"

	//PKCS＃11 URI（RFC7512）标识的证书和/或密钥
	client_cert="pkcs11:manufacturer=piv_II;id=%01"
	private_key="pkcs11:manufacturer=piv_II;id=%01"

	# Optional PIN configuration; this can be left out and PIN will be
	# asked through the control interface
	pin="1234"
}

//示例配置显示如何使用内联blob作为CA证书数据而不是使用外部文件
network={
	ssid="example"
	key_mgmt=WPA-EAP
	eap=TTLS
	identity="user@example.com"
	anonymous_identity="anonymous@example.com"
	password="foobar"
	ca_cert="blob://exampleblob"
	priority=20
}

blob-base64-exampleblob={
SGVsbG8gV29ybGQhCg==
}


//SSID的通配符匹配（仅限纯文本AP）。 此示例选择任何打开的AP，无论其SSID如何。
network={
	key_mgmt=NONE
}

//示例配置将两个AP列入黑名单 - 这些将被忽略对于这个网络。
network={
	ssid="example"
	psk="very secret passphrase"
	bssid_blacklist=02:11:22:33:44:55 02:22:aa:44:55:66
}

//示例配置将AP选择限制为一组特定的AP;任何其他与掩码地址不匹配的AP都将被忽略。
network={
	ssid="example"
	psk="very secret passphrase"
	bssid_whitelist=02:55:ae:bc:00:00/ff:ff:ff:ff:00:00 00:00:77:66:55:44/00:00:ff:ff:ff:ff
}

//示例配置文件仅在通道36上扫描。
freq_list=5180
network={
	key_mgmt=NONE
}


 //示例MACsec配置
network={
	key_mgmt=IEEE8021X
	eap=TTLS
	phase2="auth=PAP"
	anonymous_identity="anonymous@example.com"
	identity="user@example.com"
	password="secretr"
	ca_cert="/etc/cert/ca.pem"
	eapol_flags=0
	macsec_policy=1
}
```

