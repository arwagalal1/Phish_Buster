<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
        public function run(): void
        {
                $questions = [
                                // SOC
                        [
                                'path' => 'soc',
                                'sub_path' => null,
                                'text' => 'Explain the difference between TTPs, IOCs, and IOAs.',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742779920/1_xas3bk.mp3',
                        ],
                        [
                                'path' => 'soc',
                                'sub_path' => null,
                                'text' => 'What are the key components of a SOC environment?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742779926/2_qtzo4r.mp3',
                        ],
                        [
                                'path' => 'soc',
                                'sub_path' => null,
                                'text' => 'How do you differentiate between a brute-force attack and a credential stuffing attack?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742779931/3_kweh2u.mp3',
                        ],
                        [
                                'path' => 'soc',
                                'sub_path' => null,
                                'text' => 'How would you analyze a suspicious PowerShell script?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742779936/4_fmt5op.mp3',
                        ],
                        [
                                'path' => 'soc',
                                'sub_path' => null,
                                'text' => 'How do you handle a Windows event ID 4625 alert?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742779941/5_ilkvvg.mp3',
                        ],
                        [
                                'path' => 'soc',
                                'sub_path' => null,
                                'text' => 'What are the primary differences between EDR and XDR?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742779947/6_ibh21l.mp3',
                        ],
                        [
                                'path' => 'soc',
                                'sub_path' => null,
                                'text' => 'What is lateral movement, and how can you detect it?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742779952/7_zgflul.mp3',
                        ],
                        [
                                'path' => 'soc',
                                'sub_path' => null,
                                'text' => 'How do you investigate a suspected C2 (Command & Control) connection?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742779957/8_ekovgw.mp3',
                        ],
                        [
                                'path' => 'soc',
                                'sub_path' => null,
                                'text' => 'What are the key Windows log sources in threat hunting?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742779963/9_mlswjr.mp3',
                        ],
                        [
                                'path' => 'soc',
                                'sub_path' => null,
                                'text' => 'What is LOLBins, and why are they a security risk?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742779969/10_qscbab.mp3',
                        ],
                        [
                                'path' => 'soc',
                                'sub_path' => null,
                                'text' => 'How would you analyze a suspected ransomware attack?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742779974/11_ymysi2.mp3',
                        ],
                        [
                                'path' => 'soc',
                                'sub_path' => null,
                                'text' => 'What is the significance of a Windows Event ID 4720?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742779980/12_pmxcl8.mp3',
                        ],
                        [
                                'path' => 'soc',
                                'sub_path' => null,
                                'text' => 'How can you detect data exfiltration attempts?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742779986/13_qvrvth.mp3',
                        ],
                        [
                                'path' => 'soc',
                                'sub_path' => null,
                                'text' => 'What are some common Active Directory attack techniques?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742779992/14_filuyl.mp3',
                        ],
                        [
                                'path' => 'soc',
                                'sub_path' => null,
                                'text' => 'How do you differentiate between a legitimate and malicious PowerShell execution?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742779997/15_sniyhz.mp3',
                        ],
                                // Red Teaming
                        [
                                'path' => 'red_teaming',
                                'sub_path' => null,
                                'text' => 'What is Red Teaming, and how does it work?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780059/1_kyhusl.mp3',
                        ],
                        [
                                'path' => 'red_teaming',
                                'sub_path' => null,
                                'text' => 'What are common initial access techniques used in Red Teaming?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780065/2_qlgf5o.mp3',
                        ],
                        [
                                'path' => 'red_teaming',
                                'sub_path' => null,
                                'text' => 'What tools and resources are required to execute a successful Red Teaming operation?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780071/3_jjudgy.mp3',
                        ],
                        [
                                'path' => 'red_teaming',
                                'sub_path' => null,
                                'text' => 'What is OPSEC (Operational Security), and why is it important in Red Teaming?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780076/4_g119yj.mp3',
                        ],
                        [
                                'path' => 'red_teaming',
                                'sub_path' => null,
                                'text' => 'What are the main benefits of using Red Teaming in cybersecurity?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780081/5_ov7vfp.mp3',
                        ],
                        [
                                'path' => 'red_teaming',
                                'sub_path' => null,
                                'text' => 'What is a C2 (Command and Control) framework, and why is it important in Red Teaming?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780087/6_dnoonl.mp3',
                        ],
                        [
                                'path' => 'red_teaming',
                                'sub_path' => null,
                                'text' => 'What is the use of a "Pass-the-Hash" attack in Red Teaming,
and how would you use it to escalate privileges within a network?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780093/7_doisue.mp3',
                        ],
                        [
                                'path' => 'red_teaming',
                                'sub_path' => null,
                                'text' => 'What are some common initial foothold techniques used in Red Teaming?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780098/8_ykmsp4.mp3',
                        ],
                        [
                                'path' => 'red_teaming',
                                'sub_path' => null,
                                'text' => 'What is a lateral movement in a Red Teaming exercise?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780104/9_ytvr8a.mp3',
                        ],
                        [
                                'path' => 'red_teaming',
                                'sub_path' => null,
                                'text' => 'What is pivoting in a Red Teaming engagement, and how is it done?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780110/10_oxmmkg.mp3',
                        ],
                        [
                                'path' => 'red_teaming',
                                'sub_path' => null,
                                'text' => 'How would you exfiltrate sensitive data without triggering security alerts?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780115/11_p2tsnx.mp3',
                        ],
                        [
                                'path' => 'red_teaming',
                                'sub_path' => null,
                                'text' => 'You’ve gained domain admin access in an Active Directory environment. What is your next move?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780121/12_ts06ot.mp3',
                        ],
                                // Malware
                        [
                                'path' => 'malware',
                                'sub_path' => null,
                                'text' => 'What is malware analysis?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742779802/1_qput7t.mp3',
                        ],
                        [
                                'path' => 'malware',
                                'sub_path' => null,
                                'text' => 'What are the different types of malware analysis?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742779806/2_qxfrb9.mp3',
                        ],
                        [
                                'path' => 'malware',
                                'sub_path' => null,
                                'text' => 'What tools do you use for static malware analysis?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742779811/3_k1af6g.mp3',
                        ],
                        [
                                'path' => 'malware',
                                'sub_path' => null,
                                'text' => 'What tools do you use for dynamic malware analysis?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742779815/4_cey2ze.mp3',
                        ],
                        [
                                'path' => 'malware',
                                'sub_path' => null,
                                'text' => 'How can you determine if a file is packed or obfuscated?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742779821/5_hxzezw.mp3',
                        ],
                        [
                                'path' => 'malware',
                                'sub_path' => null,
                                'text' => 'What is the difference between a Trojan and a Rootkit?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742779826/6_jsx57k.mp3',
                        ],
                        [
                                'path' => 'malware',
                                'sub_path' => null,
                                'text' => 'What are Indicators of Compromise (IOCs)?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742779831/7_gdqrem.mp3',
                        ],
                        [
                                'path' => 'malware',
                                'sub_path' => null,
                                'text' => 'How do malware authors use evasion techniques?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742779836/8_nwdwqz.mp3',
                        ],
                        [
                                'path' => 'malware',
                                'sub_path' => null,
                                'text' => 'What is DLL injection, and how does it work?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742779841/9_a3uymz.mp3',
                        ],
                        [
                                'path' => 'malware',
                                'sub_path' => null,
                                'text' => 'What is Process Hollowing?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742779846/10_joh6pp.mp3',
                        ],
                        [
                                'path' => 'malware',
                                'sub_path' => null,
                                'text' => 'How does ransomware work?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742779851/11_ljnukp.mp3',
                        ],
                        [
                                'path' => 'malware',
                                'sub_path' => null,
                                'text' => 'How would you analyze a malicious macro in a Word document?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742779857/12_hp1frk.mp3',
                        ],
                        [
                                'path' => 'malware',
                                'sub_path' => null,
                                'text' => 'How do you handle a live malware sample safely?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742779862/13_vvnmcg.mp3',
                        ],
                        [
                                'path' => 'malware',
                                'sub_path' => null,
                                'text' => 'What is the difference between a keylogger and a spyware?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742779868/14_pe64mx.mp3',
                        ],
                        [
                                'path' => 'malware',
                                'sub_path' => null,
                                'text' => 'How do you prevent malware infections?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742779873/15_jrexxs.mp3',
                        ],
                                // Pentest - Network
                        [
                                'path' => 'pentest',
                                'sub_path' => 'network',
                                'text' => 'You’ve identified a vulnerable H.323 (VoIP) network service.
How would you exploit this to gain access to voice communications or other internal services within the network?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780289/network_pentest_1_yhgcw9.mp3',
                        ],
                        [
                                'path' => 'pentest',
                                'sub_path' => 'network',
                                'text' => 'How would you exploit a vulnerability in dynamic routing protocols like RIP or OSPF?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780295/network_pentest_2_siyah2.mp3',
                        ],
                        [
                                'path' => 'pentest',
                                'sub_path' => 'network',
                                'text' => 'Can you describe a real-world scenario where an RCE vulnerability led to a breach?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780301/network_pentest_3_j8ovbu.mp3',
                        ],
                        [
                                'path' => 'pentest',
                                'sub_path' => 'network',
                                'text' => 'How would you exploit an SMB (Server Message Block) vulnerability in a network pentest?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780307/network_pentest_4_lqmxmd.mp3',
                        ],
                        [
                                'path' => 'pentest',
                                'sub_path' => 'network',
                                'text' => 'Can you walk me through the process of pivoting after initial access to escalate privileges?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780313/network_pentest_5_dyvrgw.mp3',
                        ],
                        [
                                'path' => 'pentest',
                                'sub_path' => 'network',
                                'text' => 'How would you exploit weaknesses in PPTP/L2TP VPN protocols to intercept traffic?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780319/network_pentest_6_yhd38m.mp3',
                        ],
                        [
                                'path' => 'pentest',
                                'sub_path' => 'network',
                                'text' => 'How would you perform VLAN hopping using a double tagging technique to access devices on a segmented VLAN,
bypassing typical VLAN access controls, and compromise a restricted network?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780326/network_pentest_7_azybqa.mp3',
                        ],
                        [
                                'path' => 'pentest',
                                'sub_path' => 'network',
                                'text' => 'While testing a network with multiple VLANs, you attempt to send double-tagged packets and successfully reach
a VLAN that should be isolated.
What are the different types of VLAN hopping attacks, and how can network administrators prevent them?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780332/network_pentest_8_w36jhy.mp3',
                        ],
                        [
                                'path' => 'pentest',
                                'sub_path' => 'network',
                                'text' => 'You analyze outbound traffic and notice unusual TXT record queries being sent to an external domain at a high
rate.
What is DNS tunneling, and how can organizations detect and prevent it?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780338/network_pentest_9_bjfqs9.mp3',
                        ],
                        [
                                'path' => 'pentest',
                                'sub_path' => 'network',
                                'text' => 'You intercept traffic on a local network by poisoning ARP tables, capturing unencrypted data.
How can ARP spoofing be mitigated?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780344/network_pentest_10_ly8ugc.mp3',
                        ],
                        [
                                'path' => 'pentest',
                                'sub_path' => 'network',
                                'text' => 'An attacker announces false BGP routes, redirecting traffic.
How do you prevent BGP hijacking?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780351/network_pentest_11_dod3su.mp3',
                        ],
                        [
                                'path' => 'pentest',
                                'sub_path' => 'network',
                                'text' => 'Outbound DNS queries exfiltrate data via TXT records.
How do you detect and block DNS tunneling?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780356/network_pentest_12_y2sdd1.mp3',
                        ],
                        [
                                'path' => 'pentest',
                                'sub_path' => 'network',
                                'text' => 'How would you use Pass-the-Hash to escalate privileges to domain admin through RDP?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780363/network_pentest_13_mmltam.mp3',
                        ],
                        [
                                'path' => 'pentest',
                                'sub_path' => 'network',
                                'text' => 'You pivot from a compromised host to scan internal subnets.
How do you secure internal networks against pivoting?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780369/network_pentest_14_knil0o.mp3',
                        ],
                        [
                                'path' => 'pentest',
                                'sub_path' => 'network',
                                'text' => 'After identifying a vulnerable RADIUS server,
how would you perform a brute-force attack to extract the shared secret and gain access?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780376/network_pentest_15_jz5cpw.mp3',
                        ],
                                // Pentest - Mobile
                        [
                                'path' => 'pentest',
                                'sub_path' => 'mobile',
                                'text' => 'You are testing a mobile app that relies heavily on third-party SDKs. You identify a malicious SDK that
allows for remote code execution (RCE) when triggered from an external server.
How would you exploit this vulnerability without alerting the app’s monitoring or detection system?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780178/mobile_pentest_1_mdobwk.mp3',
                        ],
                        [
                                'path' => 'pentest',
                                'sub_path' => 'mobile',
                                'text' => 'How would you test an app for insecure API calls and weak authentication mechanisms?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780183/mobile_pentest_2_va9mvx.mp3',
                        ],
                        [
                                'path' => 'pentest',
                                'sub_path' => 'mobile',
                                'text' => 'What is the purpose of reverse engineering in mobile penetration testing,
and how would you use it to assess the security of a mobile app?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780189/mobile_pentest_3_ph1fa9.mp3',
                        ],
                        [
                                'path' => 'pentest',
                                'sub_path' => 'mobile',
                                'text' => 'How do you overcome challenges posed by Apple\'s app security measures, like code signing?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780195/mobile_pentest_4_hrztzf.mp3',
                        ],
                        [
                                'path' => 'pentest',
                                'sub_path' => 'mobile',
                                'text' => 'You have found a Race Condition vulnerability in a mobile app that relies on asynchronous API requests.
How would you exploit this vulnerability to bypass authentication or elevate user privileges?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780201/mobile_pentest_5_iytrtw.mp3',
                        ],
                        [
                                'path' => 'pentest',
                                'sub_path' => 'mobile',
                                'text' => 'How would you exploit weak push notification auth to steal tokens and escalate access?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780206/mobile_pentest_6_pq4rdn.mp3',
                        ],
                        [
                                'path' => 'pentest',
                                'sub_path' => 'mobile',
                                'text' => 'Can you explain how to perform a thorough test of an iOS app’s entitlements and provisioning profiles?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780212/mobile_pentest_7_pasynr.mp3',
                        ],
                        [
                                'path' => 'pentest',
                                'sub_path' => 'mobile',
                                'text' => 'You bypass SSL pinning using a proxy tool like Burp Suite and intercept encrypted traffic between the app and
server.
How does SSL pinning protect against MITM attacks, and how can you securely implement it in a mobile app?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780218/mobile_pentest_8_mazn9b.mp3',
                        ],
                        [
                                'path' => 'pentest',
                                'sub_path' => 'mobile',
                                'text' => 'The app has unprotected background services running without proper validation, enabling attackers to trigger actions or steal data.How can background services be secured to prevent unauthorized access or malicious triggers?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780224/mobile_pentest_9_yzohog.mp3',
                        ],
                        [
                                'path' => 'pentest',
                                'sub_path' => 'mobile',
                                'text' => 'How would you extract sensitive data from insecure storage in an Android app?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780230/mobile_pentest_10_k3lbpo.mp3',
                        ],
                        [
                                'path' => 'pentest',
                                'sub_path' => 'mobile',
                                'text' => 'You exploit a side-channel attack (e.g., power analysis) on a device’s Trusted Execution Environment (TEE) to
extract cryptographic keys.
How can side-channel attacks on TEEs be mitigated to protect sensitive data?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780237/mobile_pentest_11_ib8eyr.mp3',
                        ],
                        [
                                'path' => 'pentest',
                                'sub_path' => 'mobile',
                                'text' => 'The app sends sensitive data over HTTP instead of HTTPS, making it vulnerable to interception.
What are the risks of transmitting sensitive data over HTTP, and how can you enforce HTTPS with proper certificate
validation?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780243/mobile_pentest_12_yrvexr.mp3',
                        ],
                        [
                                'path' => 'pentest',
                                'sub_path' => 'mobile',
                                'text' => 'How would you hijack push notification tokens to escalate user access?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780249/mobile_pentest_13_w8an0t.mp3',
                        ],
                        [
                                'path' => 'pentest',
                                'sub_path' => 'mobile',
                                'text' => 'The app fails to regenerate session tokens after login, allowing attackers to fixate the session by sending a
predefined token, resulting in unauthorized access.
How can session fixation be prevented, and what are the best practices for secure session management, such as
regenerating session tokens on login?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780256/mobile_pentest_14_cwmtpe.mp3',
                        ],
                        [
                                'path' => 'pentest',
                                'sub_path' => 'mobile',
                                'text' => 'How would you bypass SSL pinning in an Android/iOS app to intercept traffic using MITM?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780262/mobile_pentest_15_jgivjs.mp3',
                        ],
                                // Pentest - Web
                        [
                                'path' => 'pentest',
                                'sub_path' => 'web',
                                'text' => 'How would you exploit an Open Redirect vulnerability in a web application that doesn’t properly validate URLs
but includes them in response headers?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780404/web_pentest_1_gcocxu.mp3',
                        ],
                        [
                                'path' => 'pentest',
                                'sub_path' => 'web',
                                'text' => 'The target application uses OAuth 2.0 with Implicit Flow to authenticate users. You discover a vulnerability
where access tokens are not properly validated.
How would you exploit this flaw in combination with Cross-Site Request Forgery (CSRF) to hijack a user’s account and
exfiltrate sensitive data?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780411/web_pentest_2_werdoy.mp3',
                        ],
                        [
                                'path' => 'pentest',
                                'sub_path' => 'web',
                                'text' => 'A web application has a SameSite=Lax cookie policy. How could an attacker potentially bypass this
restriction?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780417/web_pentest_3_wiqlwr.mp3',
                        ],
                        [
                                'path' => 'pentest',
                                'sub_path' => 'web',
                                'text' => 'What security flags can be set on cookies to enhance protection?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780423/web_pentest_4_l3iptn.mp3',
                        ],
                        [
                                'path' => 'pentest',
                                'sub_path' => 'web',
                                'text' => 'You’ve identified a vulnerable Server-Side JavaScript (Node.js) service that accepts user input and performs
dynamic file execution.
How would you exploit this vulnerability in a production environment to execute arbitrary code?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780430/web_pentest_5_tber5r.mp3',
                        ],
                        [
                                'path' => 'pentest',
                                'sub_path' => 'web',
                                'text' => 'you gain access to a target web server that uses Docker containers. However, the application is misconfigured
and exposes Docker API without authentication.
How would you exploit this to gain remote code execution inside the container and pivot to the host system running
Docker?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780436/web_pentest_6_dp5nkq.mp3',
                        ],
                        [
                                'path' => 'pentest',
                                'sub_path' => 'web',
                                'text' => 'You intercept an OAuth token using an attacker-controlled redirect URI. How would you abuse this to access
user data and escalate to perform admin-level actions?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780442/web_pentest_7_hje0tr.mp3',
                        ],
                        [
                                'path' => 'pentest',
                                'sub_path' => 'web',
                                'text' => 'What techniques can you use to escalate SSRF (Server-Side Request Forgery) to achieve RCE?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780448/web_pentest_8_mvtqca.mp3',
                        ],
                        [
                                'path' => 'pentest',
                                'sub_path' => 'web',
                                'text' => 'What methods can be used to extract sensitive data when XXE error messages are suppressed?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780455/web_pentest_9_tts0ei.mp3',
                        ],
                        [
                                'path' => 'pentest',
                                'sub_path' => 'web',
                                'text' => 'How can HTTP headers like Host, X-Forwarded-Host, and X-Original-URL be manipulated?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780462/web_pentest_10_tm4pnq.mp3',
                        ],
                        [
                                'path' => 'pentest',
                                'sub_path' => 'web',
                                'text' => 'How would you perform a stored XSS attack that leads to account takeover via token hijacking?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780468/web_pentest_11_a0pd1z.mp3',
                        ],
                        [
                                'path' => 'pentest',
                                'sub_path' => 'web',
                                'text' => 'A web application allows users to download their session data as a JSON file and later upload it back. You
modify the JSON object and re-upload it, gaining admin privileges.
How does this attack work, and what mitigations should be in place to prevent it?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780475/web_pentest_12_xc527l.mp3',
                        ],
                        [
                                'path' => 'pentest',
                                'sub_path' => 'web',
                                'text' => 'While performing a recon, you find that oldapp.company.com points to a decommissioned AWS S3 bucket that is
no longer claimed.
How could an attacker take over this subdomain, and what measures should be taken to prevent such issues?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780482/web_pentest_13_p9mlae.mp3',
                        ],
                        [
                                'path' => 'pentest',
                                'sub_path' => 'web',
                                'text' => 'The login form filters common SQL injection payloads like \' OR 1=1 --, but you discover that /*! SELECT *
FROM users */ bypasses the filter.
How did the payload bypass the WAF, and what are better ways to protect against SQL injection?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780489/web_pentest_14_phg2a3.mp3',
                        ],
                        [
                                'path' => 'pentest',
                                'sub_path' => 'web',
                                'text' => 'An e-commerce site allows users to apply unlimited discount coupons in a single order by modifying the
request parameters.
How can attackers exploit this, and how should developers prevent such abuse?',
                                'audio_url' => 'https://res.cloudinary.com/dvxlbdaa4/video/upload/v1742780496/web_pentest_15_enep0w.mp3',
                        ],
                ];

                foreach ($questions as $question) {
                        Question::create($question);
                }
        }
}