<?php
/**
 * @author Joas Schilling <nickvergessen@owncloud.com>
 * @author Lukas Reschke <lukas@owncloud.com>
 * @author Roeland Jago Douma <roeland@famdouma.nl>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

namespace Test;

use OC\Config;
use OC\Server;
use OC\Shutdown\ShutDownManager;
use OCA\Comments\Dav\CommentsPlugin;
use OCP\Shutdown\IShutdownManager;
use OCP\Comments\ICommentsManager;
use Test\Comments\FakeFactory;
use OC\Comments\ManagerFactory;
use OCP\IEventSource;
use OCP\ICertificateManager;
use OC\Security\CertificateManager;
use OCP\SystemTag\ISystemTagObjectMapper;
use OCP\SystemTag\ISystemTagManager;
use OC\Security\TrustedDomainHelper;
use OCP\ITempManager;
use OC\TempManager;
use OCP\ITagManager;
use OC\TagManager;
use OCP\AppFramework\Db\Mapper;
use OC\Tagging\TagMapper;
use OCP\IUserSession;
use OC\User\Session;
use OCP\IUserManager;
use OC\User\Manager;
use OCP\IURLGenerator;
use OC\URLGenerator;
use OC\SystemConfig;
use OCP\Share\IManager;
use OCP\Security\ISecureRandom;
use OC\Security\SecureRandom;
use OCP\ISearch;
use OC\Search;
use OCP\Route\IRouter;
use OCP\Files\Folder;
use OCP\Files\IRootFolder;
use OC\Files\Node\Root;
use OCP\IRequest;
use OC\AppFramework\Http\Request;
use OCP\Diagnostics\IQueryLogger;
use OCP\IPreview;
use OC\PreviewManager;
use OCP\ICache;
use OC\Cache\File;
use OCP\INavigationManager;
use OC\NavigationManager;
use OCP\Files\Config\IMountProviderCollection;
use OC\Files\Config\MountProviderCollection;
use OCP\ICacheFactory;
use OC\Memcache\Factory;
use OCP\Mail\IMailer;
use OC\Mail\Mailer;
use OCP\ILogger;
use OC\Log;
use OCP\Lock\ILockingProvider;
use OCP\L10N\IFactory;
use OCP\BackgroundJob\IJobList;
use OC\BackgroundJob\JobList;
use OC\Files\Type\Detection;
use OCP\Files\IMimeTypeDetector;
use bantu\IniGetWrapper\IniGetWrapper;
use OCP\Http\Client\IClientService;
use OC\Http\Client\ClientService;
use OC\HTTPHelper;
use OCP\Security\IHasher;
use OC\Security\Hasher;
use OCP\IGroupManager;
use OCP\Diagnostics\IEventLogger;
use OCP\Encryption\Keys\IStorage;
use OC\Encryption\Keys\Storage;
use OCP\Encryption\IFile;
use OCP\IDb;
use OC\AppFramework\Db\Db;
use OCP\IDateTimeZone;
use OC\DateTimeZone;
use OCP\IDateTimeFormatter;
use OC\DateTimeFormatter;
use OCP\IDBConnection;
use OC\DB\Connection;
use OC\Security\CSRF\CsrfTokenManager;
use OC\Session\CryptoWrapper;
use OCP\Security\ICrypto;
use OC\Security\Crypto;
use OC\Security\CSP\ContentSecurityPolicyManager;
use OC\ContactsManager;
use OC\CapabilitiesManager;
use OCP\IAvatarManager;
use OC\AvatarManager;
use OCP\Command\IBus;
use OC\Command\AsyncBus;
use OCP\App\IAppManager;
use OC\App\AppManager;
use OCP\IHelper;
use OC\AppHelper;
use OCP\IAppConfig;
use OC\AppConfig;
use OCP\IConfig;
use OC\AllConfig;

/**
 * Class Server
 *
 * @group DB
 *
 * @package Test
 */
class ServerTest extends TestCase {
	/** @var Server */
	protected $server;

	public function setUp() {
		parent::setUp();
		$config = new Config(\OC::$configDir);
		$this->server = new Server('', $config);
	}

	public function dataTestQuery() {
		return [
			['ActivityManager', \OC\Activity\Manager::class],
			['ActivityManager', \OCP\Activity\IManager::class],
			['AllConfig', AllConfig::class],
			['AllConfig', IConfig::class],
			['AppConfig', AppConfig::class],
			['AppConfig', IAppConfig::class],
			['AppHelper', AppHelper::class],
			['AppHelper', IHelper::class],
			['AppManager', AppManager::class],
			['AppManager', IAppManager::class],
			['AsyncCommandBus', AsyncBus::class],
			['AsyncCommandBus', IBus::class],
			['AvatarManager', AvatarManager::class],
			['AvatarManager', IAvatarManager::class],

			['CapabilitiesManager', CapabilitiesManager::class],
			['ContactsManager', ContactsManager::class],
			['ContactsManager', \OCP\Contacts\IManager::class],
			['ContentSecurityPolicyManager', ContentSecurityPolicyManager::class],
			['CommentsManager', ICommentsManager::class],
			['Crypto', Crypto::class],
			['Crypto', ICrypto::class],
			['CryptoWrapper', CryptoWrapper::class],
			['CsrfTokenManager', CsrfTokenManager::class],

			['DatabaseConnection', Connection::class],
			['DatabaseConnection', IDBConnection::class],
			['DateTimeFormatter', DateTimeFormatter::class],
			['DateTimeFormatter', IDateTimeFormatter::class],
			['DateTimeZone', DateTimeZone::class],
			['DateTimeZone', IDateTimeZone::class],
			['Db', Db::class],
			['Db', IDb::class],

			['EncryptionFileHelper', \OC\Encryption\File::class],
			['EncryptionFileHelper', IFile::class],
			['EncryptionKeyStorage', Storage::class],
			['EncryptionKeyStorage', IStorage::class],
			['EncryptionManager', \OC\Encryption\Manager::class],
			['EncryptionManager', \OCP\Encryption\IManager::class],
			['EventLogger', IEventLogger::class],

			['GroupManager', \OC\Group\Manager::class],
			['GroupManager', IGroupManager::class],

			['Hasher', Hasher::class],
			['Hasher', IHasher::class],
			['HTTPHelper', HTTPHelper::class],
			['HttpClientService', ClientService::class],
			['HttpClientService', IClientService::class],

			['IniWrapper', IniGetWrapper::class],
			['MimeTypeDetector', IMimeTypeDetector::class],
			['MimeTypeDetector', Detection::class],

			['JobList', JobList::class],
			['JobList', IJobList::class],

			['L10NFactory', \OC\L10N\Factory::class],
			['L10NFactory', IFactory::class],
			['LockingProvider', ILockingProvider::class],
			['Logger', Log::class],
			['Logger', ILogger::class],

			['Mailer', Mailer::class],
			['Mailer', IMailer::class],
			['MemCacheFactory', Factory::class],
			['MemCacheFactory', ICacheFactory::class],
			['MountConfigManager', MountProviderCollection::class],
			['MountConfigManager', IMountProviderCollection::class],

			['NavigationManager', NavigationManager::class],
			['NavigationManager', INavigationManager::class],
			['NotificationManager', \OC\Notification\Manager::class],
			['NotificationManager', \OCP\Notification\IManager::class],
			['UserCache', File::class],
			['UserCache', ICache::class],

			['PreviewManager', PreviewManager::class],
			['PreviewManager', IPreview::class],

			['QueryLogger', IQueryLogger::class],

			['Request', Request::class],
			['Request', IRequest::class],
			['RootFolder', Root::class],
			['RootFolder', \OC\Files\Node\Folder::class],
			['RootFolder', IRootFolder::class],
			['RootFolder', Folder::class],
			['Router', IRouter::class],

			['Search', Search::class],
			['Search', ISearch::class],
			['SecureRandom', SecureRandom::class],
			['SecureRandom', ISecureRandom::class],
			['ShareManager', \OC\Share20\Manager::class],
			['ShareManager', IManager::class],
			['SystemConfig', SystemConfig::class],

			['URLGenerator', URLGenerator::class],
			['URLGenerator', IURLGenerator::class],
			['UserManager', Manager::class],
			['UserManager', IUserManager::class],
			['UserSession', Session::class],
			['UserSession', IUserSession::class],

			['TagMapper', TagMapper::class],
			['TagMapper', Mapper::class],
			['TagManager', TagManager::class],
			['TagManager', ITagManager::class],
			['TempManager', TempManager::class],
			['TempManager', ITempManager::class],
			['TrustedDomainHelper', TrustedDomainHelper::class],

			['SystemTagManager', ISystemTagManager::class],
			['SystemTagObjectMapper', ISystemTagObjectMapper::class],

			[ShutDownManager::class, IShutdownManager::class]
		];
	}

	/**
	 * @dataProvider dataTestQuery
	 *
	 * @param string $serviceName
	 * @param string $instanceOf
	 * @throws \OCP\AppFramework\QueryException
	 */
	public function testQuery($serviceName, $instanceOf) {
		$this->assertInstanceOf($instanceOf,
			$this->server->query($serviceName),
			'Service "' . $serviceName . '"" did not return the right class');
	}

	public function testGetCertificateManager() {
		$this->assertInstanceOf(CertificateManager::class,
			$this->server->getCertificateManager('test'),
			'service returned by "getCertificateManager" did not return the right class');
		$this->assertInstanceOf(ICertificateManager::class,
			$this->server->getCertificateManager('test'),
			'service returned by "getCertificateManager" did not return the right class');
	}

	public function testCreateEventSource() {
		$this->assertInstanceOf(\OC_EventSource::class,
			$this->server->createEventSource(),
			'service returned by "createEventSource" did not return the right class');
		$this->assertInstanceOf(IEventSource::class,
			$this->server->createEventSource(),
			'service returned by "createEventSource" did not return the right class');
	}

	public function testOverwriteDefaultCommentsManager() {
		$config = $this->server->getConfig();
		$defaultManagerFactory = $config->getSystemValue('comments.managerFactory', ManagerFactory::class);

		$config->setSystemValue('comments.managerFactory', FakeFactory::class);

		$manager = $this->server->getCommentsManager();
		$this->assertInstanceOf(ICommentsManager::class, $manager);

		$config->setSystemValue('comments.managerFactory', $defaultManagerFactory);
	}

	/**
	 * @dataProvider providesServiceLoader
	 * @param $xmlPath
	 * @param $expects
	 * @throws \Exception
	 */
	public function testServiceLoader($xmlPath, $expects) {
		if ($expects === false) {
			$this->expectException(\Exception::class);
			\iterator_to_array($this->server->load($xmlPath));
		} else {
			$iter = \iterator_to_array($this->server->load($xmlPath));
			$this->assertInstanceOf($expects, $iter[0]);
		}
	}

	public function providesServiceLoader() {
		return [
			[['name'], false],
			[['sabre', 'plugins'], CommentsPlugin::class]
		];
	}
}
