<?php

namespace Test\Share;

use OC\Share\Filters\MailNotificationFilter;
use Test\TestCase;

class MailNotificationFilterTest extends TestCase {

	/**
	 * @dataProvider mailNotificationData
	 * @param array $original
	 * @param array $expected
	 */
	public function testCanFilterMailNotificationData($original, $expected) {
		$mailNotificationFilter = new MailNotificationFilter($original);
		$this->assertSame($expected['file'], $mailNotificationFilter->getFile());
		$this->assertSame($expected['link'], $mailNotificationFilter->getLink());
		$this->assertSame($expected['toAddress'], $mailNotificationFilter->getToAddress());
		$this->assertSame($expected['expirationDate'], $mailNotificationFilter->getExpirationDate());
	}

	public function mailNotificationData() {
		return [
			[
				[
					'link' => 'immi.jpg',
					'file' => '<h1><a href="http:www.google.com">Click Here!<i hidden>.txt',
					'toAddress' => 'me@example.com',
					'expirationDate' => '19-12-2017',
				],
				[
					'link' => 'immi.jpg',
					'file' => '&lt;h1&gt;&lt;a href=&quot;http:www.google.com&quot;&gt;Click Here!&lt;i hidden&gt;.txt',
					'toAddress' => 'me@example.com',
					'expirationDate' => '19-12-2017',
				]
			],
			[
				[
					'link' => '  <strong>An awesome file</strong>',
					'file' => '  a-<a>generic</a>-file.txt    ',
					'toAddress' => 'you@example.com    ',
					'expirationDate' => '    19-12-2017',
				],
				[
					'link' => 'An awesome file',
					'file' => 'a-&lt;a&gt;generic&lt;/a&gt;-file.txt',
					'toAddress' => 'you@example.com',
					'expirationDate' => '19-12-2017',
				]
			],
		];
	}
}
