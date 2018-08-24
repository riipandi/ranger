<?php

use Illuminate\Database\Seeder;
use App\RecordType;

class RecordTypeSeeder extends Seeder
{
    public function run()
    {
        $types = [
            'A'          => 'The A record contains an IP address',
            'AAAA'       => 'The AAAA record contains an IPv6 address',
            'AFSDB'      => 'A specialised record type for the Andrew Filesystem',
            'ALIAS'      => 'The ALIAS pseudo-record type is supported to provide CNAME-like mechanisms on a zone apex',
            'CAA'        => 'The Certification Authority Authorization record, specified in RFC 6844, is used to specify Certificate Authorities that may issue certificates for a domain',
            'CERT'       => 'Specialised record type for storing certificates, defined in RFC 2538',
            'CDNSKEY'    => 'The CDNSKEY (Child DNSKEY) type is supported',
            'CDS'        => 'The CDS (Child DS) type is supported',
            'CNAME'      => 'The CNAME record specifies the canonical name of a record',
            'DNSKEY'     => 'The DNSKEY DNSSEC record type is fully supported, as described in RFC 4034',
            'DNAME'      => 'The DNAME record, as specified in RFC 6672 is supported',
            'DS'         => 'The DS DNSSEC record type is fully supported, as described in RFC 4034',
            'HINFO'      => 'Hardware Info record, used to specify CPU and operating system',
            'KEY'        => 'The KEY record is fully supported. For its syntax, see RFC 2535',
            'LOC'        => 'The LOC record is fully supported. For its syntax, see RFC 1876',
            'MX'         => 'The MX record specifies a mail exchanger host for a domain',
            'NAPTR'      => 'Naming Authority Pointer, RFC 2915',
            'NS'         => 'Nameserver record. Specifies nameservers for a domain',
            'NSEC'       => 'The NSEC, NSEC3 and NSEC3PARAM DNSSEC record type are fully supported, as described in RFC 4034',
            'NSEC3'      => 'The NSEC, NSEC3 and NSEC3PARAM DNSSEC record type are fully supported, as described in RFC 4034',
            'NSEC3PARAM' => 'The NSEC, NSEC3 and NSEC3PARAM DNSSEC record type are fully supported, as described in RFC 4034',
            'OPENPGPKEY' => 'The OPENPGPKEY records, specified in RFC 7929, are used to bind OpenPGP certificates to email addresses',
            'PTR'        => 'Reverse pointer, used to specify the host name belonging to an IP or IPv6 address',
            'RP'         => 'Responsible Person record, as described in RFC 1183',
            'RRSIG'      => 'The RRSIG DNSSEC record type is fully supported, as described in RFC 4034',
            'SOA'        => 'The Start of Authority record is one of the most complex available',
            'SPF'        => 'SPF records can be used to store Sender Policy Framework details (RFC 4408)',
            'SSHFP'      => 'The SSHFP record type, used for storing Secure Shell (SSH) fingerprints, is fully supported',
            'SRV'        => 'SRV records can be used to encode the location and port of services on a domain name',
            'TKEY'       => 'The TKEY (RFC 2930) and TSIG records (RFC 2845, used for key-exchange and authenticated AXFRs',
            'TSIG'       => 'The TKEY (RFC 2930) and TSIG records (RFC 2845, used for key-exchange and authenticated AXFRs',
            'TLSA'       => 'Since 3.0. The TLSA records, specified in RFC 6698, are used to bind SSL/TLS certificate to named hosts and ports',
            'SMIMEA'     => 'Since 4.1. The SMIMEA record type, specified in RFC 8162, is used to bind S/MIME certificates to domains',
            'TXT'        => 'The TXT field can be used to attach textual data to a domain. Text is stored plainly, PowerDNS understands content not enclosed in quotes',
            'URI'        => 'The URI record, specified in RFC 7553, is used to publish mappings from hostnames to URIs',
        ];

        foreach ($types as $key => $val) {
            RecordType::create([
                'name'        => $key,
                'description' => $val
            ]);
        }
    }
}
