<?php

/**
 * Pure-PHP implementation of SFTP.
 *
 * PHP version 5
 *
 * Currently only supports SFTPv2 and v3, which, according to wikipedia.org, "is the most widely used version,
 * implemented by the popular OpenSSH SFTP server".  If you want SFTPv4/5/6 support, provide me with access
 * to an SFTPv4/5/6 server.
 *
 * The API for this library is modeled after the API from PHP's {@link http://php.net/book.ftp FTP extension}.
 *
 * Here's a short example of how to use this library:
 * <code>
 * <?php
 *    include 'vendor/autoload.php';
 *
 *    $sftp = new \phpseclib3\Net\SFTP('www.domain.tld');
 *    if (!$sftp->login('username', 'password')) {
 *        exit('Login Failed');
 *    }
 *
 *    echo $sftp->pwd() . "\r\n";
 *    $sftp->put('filename.ext', 'hello, world!');
 *    print_r($sftp->nlist());
 * ?>
 * </code>
 *
 * @category  Net
 * @package   SFTP
 * @author    Jim Wigginton <terrafrost@php.net>
 * @copyright 2009 Jim Wigginton
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link      http://phpseclib.sourceforge.net
 */

namespace phpseclib3\Net;

use phpseclib3\Exception\FileNotFoundException;
use phpseclib3\Common\Functions\Strings;
use phpseclib3\Crypt\Common\AsymmetricKey;
use phpseclib3\System\SSH\Agent;

/**
 * Pure-PHP implementations of SFTP.
 *
 * @package SFTP
 * @author  Jim Wigginton <terrafrost@php.net>
 * @access  public
 */
class SFTP extends SSH2
{
    /**
     * SFTP channel constant
     *
     * \phpseclib3\Net\SSH2::exec() uses 0 and \phpseclib3\Net\SSH2::read() / \phpseclib3\Net\SSH2::write() use 1.
     *
     * @see \phpseclib3\Net\SSH2::send_channel_packet()
     * @see \phpseclib3\Net\SSH2::get_channel_packet()
     * @access private
     */
    const CHANNEL = 0x100;

    /**
     * Reads data from a local file.
     *
     * @access public
     * @see \phpseclib3\Net\SFTP::put()
     */
    const SOURCE_LOCAL_FILE = 1;
    /**
     * Reads data from a string.
     *
     * @access public
     * @see \phpseclib3\Net\SFTP::put()
     */
    // this value isn't really used anymore but i'm keeping it reserved for historical reasons
    const SOURCE_STRING = 2;
    /**
     * Reads data from callback:
     * function callback($length) returns string to proceed, null for EOF
     *
     * @access public
     * @see \phpseclib3\Net\SFTP::put()
     */
    const SOURCE_CALLBACK = 16;
    /**
     * Resumes an upload
     *
     * @access public
     * @see \phpseclib3\Net\SFTP::put()
     */
    const RESUME = 4;
    /**
     * Append a local file to an already existing remote file
     *
     * @access public
     * @see \phpseclib3\Net\SFTP::put()
     */
    const RESUME_START = 8;

    /**
     * Packet Types
     *
     * @see self::__construct()
     * @var array
     * @access private
     */
    private $packet_types = [];

    /**
     * Status Codes
     *
     * @see self::__construct()
     * @var array
     * @access private
     */
    private $status_codes = [];

    /**
     * The Request ID
     *
     * The request ID exists in the off chance that a packet is sent out-of-order.  Of course, this library doesn't support
     * concurrent actions, so it's somewhat academic, here.
     *
     * @var boolean
     * @see self::_send_sftp_packet()
     * @access private
     */
    private $use_request_id = false;

    /**
     * The Packet Type
     *
     * The request ID exists in the off chance that a packet is sent out-of-order.  Of course, this library doesn't support
     * concurrent actions, so it's somewhat academic, here.
     *
     * @var int
     * @see self::_get_sftp_packet()
     * @access private
     */
    private $packet_type = -1;

    /**
     * Packet Buffer
     *
     * @var string
     * @see self::_get_sftp_packet()
     * @access private
     */
    private $packet_buffer = '';

    /**
     * Extensions supported by the server
     *
     * @var array
     * @see self::_initChannel()
     * @access private
     */
    private $extensions = [];

    /**
     * Server SFTP version
     *
     * @var int
     * @see self::_initChannel()
     * @access private
     */
    private $version;

    /**
     * Current working directory
     *
     * @var string
     * @see self::realpath()
     * @see self::chdir()
     * @access private
     */
    private $pwd = false;

    /**
     * Packet Type Log
     *
     * @see self::getLog()
     * @var array
     * @access private
     */
    private $packet_type_log = [];

    /**
     * Packet Log
     *
     * @see self::getLog()
     * @var array
     * @access private
     */
    private $packet_log = [];

    /**
     * Error information
     *
     * @see self::getSFTPErrors()
     * @see self::getLastSFTPError()
     * @var array
     * @access private
     */
    private $sftp_errors = [];

    /**
     * Stat Cache
     *
     * Rather than always having to open a directory and close it immediately there after to see if a file is a directory
     * we'll cache the results.
     *
     * @see self::_update_stat_cache()
     * @see self::_remove_from_stat_cache()
     * @see self::_query_stat_cache()
     * @var array
     * @access private
     */
    private $stat_cache = [];

    /**
     * Max SFTP Packet Size
     *
     * @see self::__construct()
     * @see self::get()
     * @var array
     * @access private
     */
    private $max_sftp_packet;

    /**
     * Stat Cache Flag
     *
     * @see self::disableStatCache()
     * @see self::enableStatCache()
     * @var bool
     * @access private
     */
    private $use_stat_cache = true;

    /**
     * Sort Options
     *
     * @see self::_comparator()
     * @see self::setListOrder()
     * @var array
     * @access private
     */
    protected $sortOptions = [];

    /**
     * Canonicalization Flag
     *
     * Determines whether or not paths should be canonicalized before being
     * passed on to the remote server.
     *
     * @see self::enablePathCanonicalization()
     * @see self::disablePathCanonicalization()
     * @see self::realpath()
     * @var bool
     * @access private
     */
    private $canonicalize_paths = true;

    /**
     * Request Buffers
     *
     * @see self::_get_sftp_packet()
     * @var array
     * @access private
     */
    private $requestBuffer = array();

    /**
     * Preserve timestamps on file downloads / uploads
     *
     * @see self::get()
     * @see self::put()
     * @var bool
     * @access private
     */
    private $preserveTime = false;

    /**
     * Default Constructor.
     *
     * Connects to an SFTP server
     *
     * @param string $host
     * @param int $port
     * @param int $timeout
     * @return \phpseclib3\Net\SFTP
     * @access public
     */
    public function __construct($host, $port = 22, $timeout = 10)
    {
        parent::__construct($host, $port, $timeout);

        $this->max_sftp_packet = 1 << 15;

        $this->packet_types = [
            1  => 'NET_SFTP_INIT',
            2  => 'NET_SFTP_VERSION',
            /* the format of SSH_FXP_OPEN changed between SFTPv4 and SFTPv5+:
                   SFTPv5+: http://tools.ietf.org/html/draft-ietf-secsh-filexfer-13#section-8.1.1
               pre-SFTPv5 : http://tools.ietf.org/html/draft-ietf-secsh-filexfer-04#section-6.3 */
            3  => 'NET_SFTP_OPEN',
            4  => 'NET_SFTP_CLOSE',
            5  => 'NET_SFTP_READ',
            6  => 'NET_SFTP_WRITE',
            7  => 'NET_SFTP_LSTAT',
            9  => 'NET_SFTP_SETSTAT',
            11 => 'NET_SFTP_OPENDIR',
            12 => 'NET_SFTP_READDIR',
            13 => 'NET_SFTP_REMOVE',
            14 => 'NET_SFTP_MKDIR',
            15 => 'NET_SFTP_RMDIR',
            16 => 'NET_SFTP_REALPATH',
            17 => 'NET_SFTP_STAT',
            /* the format of SSH_FXP_RENAME changed between SFTPv4 and SFTPv5+:
                   SFTPv5+: http://tools.ietf.org/html/draft-ietf-secsh-filexfer-13#section-8.3
               pre-SFTPv5 : http://tools.ietf.org/html/draft-ietf-secsh-filexfer-04#section-6.5 */
            18 => 'NET_SFTP_RENAME',
            19 => 'NET_SFTP_READLINK',
            20 => 'NET_SFTP_SYMLINK',

            101=> 'NET_SFTP_STATUS',
            102=> 'NET_SFTP_HANDLE',
            /* the format of SSH_FXP_NAME changed between SFTPv3 and SFTPv4+:
                   SFTPv4+: http://tools.ietf.org/html/draft-ietf-secsh-filexfer-13#section-9.4
               pre-SFTPv4 : http://tools.ietf.org/html/draft-ietf-secsh-filexfer-02#section-7 */
            103=> 'NET_SFTP_DATA',
            104=> 'NET_SFTP_NAME',
            105=> 'NET_SFTP_ATTRS',

            200=> 'NET_SFTP_EXTENDED'
        ];
        $this->status_codes = [
            0 => 'NET_SFTP_STATUS_OK',
            1 => 'NET_SFTP_STATUS_EOF',
            2 => 'NET_SFTP_STATUS_NO_SUCH_FILE',
            3 => 'NET_SFTP_STATUS_PERMISSION_DENIED',
            4 => 'NET_SFTP_STATUS_FAILURE',
            5 => 'NET_SFTP_STATUS_BAD_MESSAGE',
            6 => 'NET_SFTP_STATUS_NO_CONNECTION',
            7 => 'NET_SFTP_STATUS_CONNECTION_LOST',
            8 => 'NET_SFTP_STATUS_OP_UNSUPPORTED',
            9 => 'NET_SFTP_STATUS_INVALID_HANDLE',
            10 => 'NET_SFTP_STATUS_NO_SUCH_PATH',
            11 => 'NET_SFTP_STATUS_FILE_ALREADY_EXISTS',
            12 => 'NET_SFTP_STATUS_WRITE_PROTECT',
            13 => 'NET_SFTP_STATUS_NO_MEDIA',
            14 => 'NET_SFTP_STATUS_NO_SPACE_ON_FILESYSTEM',
            15 => 'NET_SFTP_STATUS_QUOTA_EXCEEDED',
            16 => 'NET_SFTP_STATUS_UNKNOWN_PRINCIPAL',
            17 => 'NET_SFTP_STATUS_LOCK_CONFLICT',
            18 => 'NET_SFTP_STATUS_DIR_NOT_EMPTY',
            19 => 'NET_SFTP_STATUS_NOT_A_DIRECTORY',
            20 => 'NET_SFTP_STATUS_INVALID_FILENAME',
            21 => 'NET_SFTP_STATUS_LINK_LOOP',
            22 => 'NET_SFTP_STATUS_CANNOT_DELETE',
            23 => 'NET_SFTP_STATUS_INVALID_PARAMETER',
            24 => 'NET_SFTP_STATUS_FILE_IS_A_DIRECTORY',
            25 => 'NET_SFTP_STATUS_BYTE_RANGE_LOCK_CONFLICT',
            26 => 'NET_SFTP_STATUS_BYTE_RANGE_LOCK_REFUSED',
            27 => 'NET_SFTP_STATUS_DELETE_PENDING',
            28 => 'NET_SFTP_STATUS_FILE_CORRUPT',
            29 => 'NET_SFTP_STATUS_OWNER_INVALID',
            30 => 'NET_SFTP_STATUS_GROUP_INVALID',
            31 => 'NET_SFTP_STATUS_NO_MATCHING_BYTE_RANGE_LOCK'
        ];
        // http://tools.ietf.org/html/draft-ietf-secsh-filexfer-13#section-7.1
        // the order, in this case, matters quite a lot - see \phpseclib3\Net\SFTP::_parseAttributes() to understand why
        $this->attributes = [
            0x00000001 => 'NET_SFTP_ATTR_SIZE',
            0x00000002 => 'NET_SFTP_ATTR_UIDGID', // defined in SFTPv3, removed in SFTPv4+
            0x00000004 => 'NET_SFTP_ATTR_PERMISSIONS',
            0x00000008 => 'NET_SFTP_ATTR_ACCESSTIME',
            // 0x80000000 will yield a floating point on 32-bit systems and converting floating points to integers
            // yields inconsistent behavior depending on how php is compiled.  so we left shift -1 (which, in
            // two's compliment, consists of all 1 bits) by 31.  on 64-bit systems this'll yield 0xFFFFFFFF80000000.
            // that's not a problem, however, and 'anded' and a 32-bit number, as all the leading 1 bits are ignored.
            (-1 << 31) & 0xFFFFFFFF => 'NET_SFTP_ATTR_EXTENDED'
        ];
        // http://tools.ietf.org/html/draft-ietf-secsh-filexfer-04#section-6.3
        // the flag definitions change somewhat in SFTPv5+.  if SFTPv5+ support is added to this library, maybe name
        // the array for that $this->open5_flags and similarly alter the constant names.
        $this->open_flags = [
            0x00000001 => 'NET_SFTP_OPEN_READ',
            0x00000002 => 'NET_SFTP_OPEN_WRITE',
            0x00000004 => 'NET_SFTP_OPEN_APPEND',
            0x00000008 => 'NET_SFTP_OPEN_CREATE',
            0x00000010 => 'NET_SFTP_OPEN_TRUNCATE',
            0x00000020 => 'NET_SFTP_OPEN_EXCL'
        ];
        // http://tools.ietf.org/html/draft-ietf-secsh-filexfer-04#section-5.2
        // see \phpseclib3\Net\SFTP::_parseLongname() for an explanation
        $this->file_types = [
            1 => 'NET_SFTP_TYPE_REGULAR',
            2 => 'NET_SFTP_TYPE_DIRECTORY',
            3 => 'NET_SFTP_TYPE_SYMLINK',
            4 => 'NET_SFTP_TYPE_SPECIAL',
            5 => 'NET_SFTP_TYPE_UNKNOWN',
            // the following types were first defined for use in SFTPv5+
            // http://tools.ietf.org/html/draft-ietf-secsh-filexfer-05#section-5.2
            6 => 'NET_SFTP_TYPE_SOCKET',
            7 => 'NET_SFTP_TYPE_CHAR_DEVICE',
            8 => 'NET_SFTP_TYPE_BLOCK_DEVICE',
            9 => 'NET_SFTP_TYPE_FIFO'
        ];
        $this->define_array(
            $this->packet_types,
            $this->status_codes,
            $this->attributes,
            $this->open_flags,
            $this->file_types
        );

        if (!defined('NET_SFTP_QUEUE_SIZE')) {
            define('NET_SFTP_QUEUE_SIZE', 32);
        }
        if (!defined('NET_SFTP_UPLOAD_QUEUE_SIZE')) {
            define('NET_SFTP_UPLOAD_QUEUE_SIZE', 1024);
        }
    }

    /**
     * Login
     *
     * @param string $username
     * @param string|AsymmetricKey|array[]|Agent|null ...$args
     * @throws \UnexpectedValueException on receipt of unexpected packets
     * @return bool
     * @access public
     */
    public function login($username, ...$args)
    {
        if (!parent::login(...func_get_args())) {
            return false;
        }

        $this->window_size_server_to_client[self::CHANNEL] = $this->window_size;

        $packet = Strings::packSSH2(
            'CsN3',
            NET_SSH2_MSG_CHANNEL_OPEN,
            'session',
            self::CHANNEL,
            $this->window_size,
            0x4000
        );

        $this->send_binary_packet($packet);

        $this->channel_status[self::CHANNEL] = NET_SSH2_MSG_CHANNEL_OPEN;

        $response = $this->get_channel_packet(self::CHANNEL, true);
        if ($response === false) {
            return false;
        }

        $packet = Strings::packSSH2(
            'CNsbs',
            NET_SSH2_MSG_CHANNEL_REQUEST,
            $this->server_channels[self::CHANNEL],
            'subsystem',
            true,
            'sftp'
        );
        $this->send_binary_packet($packet);

        $this->channel_status[self::CHANNEL] = NET_SSH2_MSG_CHANNEL_REQUEST;

        $response = $this->get_channel_packet(self::CHANNEL, true);
        if ($response === false) {
            // from PuTTY's psftp.exe
            $command = "test -x /usr/lib/sftp-server && exec /usr/lib/sftp-server\n" .
                       "test -x /usr/local/lib/sftp-server && exec /usr/local/lib/sftp-server\n" .
                       "exec sftp-server";
            // we don't do $this->exec($command, false) because exec() operates on a different channel and plus the SSH_MSG_CHANNEL_OPEN that exec() does
            // is redundant
            $packet = Strings::packSSH2(
                'CNsCs',
                NET_SSH2_MSG_CHANNEL_REQUEST,
                $this->server_channels[self::CHANNEL],
                'exec',
                1,
                $command
            );
            $this->send_binary_packet($packet);

            $this->channel_status[self::CHANNEL] = NET_SSH2_MSG_CHANNEL_REQUEST;

            $response = $this->get_channel_packet(self::CHANNEL, true);
            if ($response === false) {
                return false;
            }
        }

        $this->channel_status[self::CHANNEL] = NET_SSH2_MSG_CHANNEL_DATA;

        if (!$this->send_sftp_packet(NET_SFTP_INIT, "\0\0\0\3")) {
            return false;
        }

        $response = $this->get_sftp_packet();
        if ($this->packet_type != NET_SFTP_VERSION) {
            throw new \UnexpectedValueException('Expected NET_SFTP_VERSION. '
                                              . 'Got packet type: ' . $this->packet_type);
        }

        list($this->version) = Strings::unpackSSH2('N', $response);
        while (!empty($response)) {
            list($key, $value) = Strings::unpackSSH2('ss', $response);
            $this->extensions[$key] = $value;
        }

        /*
         SFTPv4+ defines a 'newline' extension.  SFTPv3 seems to have unofficial support for it via 'newline@vandyke.com',
         however, I'm not sure what 'newline@vandyke.com' is supposed to do (the fact that it's unofficial means that it's
         not in the official SFTPv3 specs) and 'newline@vandyke.com' / 'newline' are likely not drop-in substitutes for
         one another due to the fact that 'newline' comes with a SSH_FXF_TEXT bitmask whereas it seems unlikely that
         'newline@vandyke.com' would.
        */
        /*
        if (isset($this->extensions['newline@vandyke.com'])) {
            $this->extensions['newline'] = $this->extensions['newline@vandyke.com'];
            unset($this->extensions['newline@vandyke.com']);
        }
        */

        $this->use_request_id = true;

        /*
         A Note on SFTPv4/5/6 support:
         <http://tools.ietf.org/html/draft-ietf-secsh-filexfer-13#section-5.1> states the following:

         "If the client wishes to interoperate with servers that support noncontiguous version
          numbers it SHOULD send '3'"

         Given that the server only sends its version number after the client has already done so, the above
         seems to be suggesting that v3 should be the default version.  This makes sense given that v3 is the
         most popular.

         <http://tools.ietf.org/html/draft-ietf-secsh-filexfer-13#section-5.5> states the following;

         "If the server did not send the "versions" extension, or the version-from-list was not included, the
          server MAY send a status response describing the failure, but MUST then close the channel without
          processing any further requests."

         So what do you do if you have a client whose initial SSH_FXP_INIT packet says it implements v3 and
         a server whose initial SSH_FXP_VERSION reply says it implements v4 and only v4?  If it only implements
         v4, the "versions" extension is likely not going to have been sent so version re-negotiation as discussed
         in draft-ietf-secsh-filexfer-13 would be quite impossible.  As such, what \phpseclib3\Net\SFTP would do is close the
         channel and reopen it with a new and updated SSH_FXP_INIT packet.
        */
        switch ($this->version) {
            case 2:
            case 3:
                break;
            default:
                return false;
        }

        $this->pwd = $this->realpath('.');

        $this->update_stat_cache($this->pwd, []);

        return true;
    }

    /**
     * Disable the stat cache
     *
     * @access public
     */
    function disableStatCache()
    {
        $this->use_stat_cache = false;
    }

    /**
     * Enable the stat cache
     *
     * @access public
     */
    public function enableStatCache()
    {
        $this->use_stat_cache = true;
    }

    /**
     * Clear the stat cache
     *
     * @access public
     */
    public function clearStatCache()
    {
        $this->stat_cache = [];
    }

    /**
     * Enable path canonicalization
     *
     * @access public
     */
    public function enablePathCanonicalization()
    {
        $this->canonicalize_paths = true;
    }

    /**
     * Enable path canonicalization
     *
     * @access public
     */
    public function disablePathCanonicalization()
    {
        $this->canonicalize_paths = false;
    }

    /**
     * Returns the current directory name
     *
     * @return mixed
     * @access public
     */
    public function pwd()
    {
        return $this->pwd;
    }

    /**
     * Logs errors
     *
     * @param string $response
     * @param int $status
     * @access private
     */
    private function logError($response, $status = -1)
    {
        if ($status == -1) {
            list($status) = Strings::unpackSSH2('N', $response);
        }

        list($error) = $this->status_codes[$status];

        if ($this->version > 2) {
            list($message) = Strings::unpackSSH2('s', $response);
            $this->sftp_errors[] = "$error: $message";
        } else {
            $this->sftp_errors[] = $error;
        }
    }

    /**
     * Canonicalize the Server-Side Path Name
     *
     * SFTP doesn't provide a mechanism by which the current working directory can be changed, so we'll emulate it.  Returns
     * the absolute (canonicalized) path.
     *
     * If canonicalize_paths has been disabled using disablePathCanonicalization(), $path is returned as-is.
     *
     * @see self::chdir()
     * @see self::disablePathCanonicalization()
     * @param string $path
     * @throws \UnexpectedValueException on receipt of unexpected packets
     * @return mixed
     * @access public
     */
    public function realpath($path)
    {
        if (!$this->canonicalize_paths) {
            return $path;
        }

        if ($this->pwd === false) {
            // http://tools.ietf.org/html/draft-ietf-secsh-filexfer-13#section-8.9
            if (!$this->send_sftp_packet(NET_SFTP_REALPATH, Strings::packSSH2('s', $path))) {
                return false;
            }

            $response = $this->get_sftp_packet();
            switch ($this->packet_type) {
                case NET_SFTP_NAME:
                    // although SSH_FXP_NAME is implemented differently in SFTPv3 than it is in SFTPv4+, the following
                    // should work on all SFTP versions since the only part of the SSH_FXP_NAME packet the following looks
                    // at is the first part and that part is defined the same in SFTP versions 3 through 6.
                    list(, $filename) = Strings::unpackSSH2('Ns', $response);
                    return $filename;
                case NET_SFTP_STATUS:
                    $this->logError($response);
                    return false;
                default:
                    throw new \UnexpectedValueException('Expected NET_SFTP_NAME or NET_SFTP_STATUS. '
                                                      . 'Got packet type: ' . $this->packet_type);
            }
        }

        if (!strlen($path) || $path[0] != '/') {
            $path = $this->pwd . '/' . $path;
        }

        $path = explode('/', $path);
        $new = [];
        foreach ($path as $dir) {
            if (!strlen($dir)) {
                continue;
            }
            switch ($dir) {
                case '..':
                    array_pop($new);
                case '.':
                    break;
                default:
                    $new[] = $dir;
            }
        }

        return '/' . implode('/', $new);
    }

    /**
     * Changes the current directory
     *
     * @param string $dir
     * @throws \UnexpectedValueException on receipt of unexpected packets
     * @return bool
     * @access public
     */
    public function chdir($dir)
    {
        if (!($this->bitmap & SSH2::MASK_LOGIN)) {
            return false;
        }

        // assume current dir if $dir is empty
        if ($dir === '') {
            $dir = './';
        // suffix a slash if needed
        } elseif ($dir[strlen($dir) - 1] != '/') {
            $dir.= '/';
        }

        $dir = $this->realpath($dir);

        // confirm that $dir is, in fact, a valid directory
        if ($this->use_stat_cache && is_array($this->query_stat_cache($dir))) {
            $this->pwd = $dir;
            return true;
        }

        // we could do a stat on the alleged $dir to see if it's a directory but that doesn't tell us
        // the currently logged in user has the appropriate permissions or not. maybe you could see if
        // the file's uid / gid match the currently logged in user's uid / gid but how there's no easy
        // way to get those with SFTP

        if (!$this->send_sftp_packet(NET_SFTP_OPENDIR, Strings::packSSH2('s', $dir))) {
            return false;
        }

        // see \phpseclib3\Net\SFTP::nlist() for a more thorough explanation of the following
        $response = $this->get_sftp_packet();
        switch ($this->packet_type) {
            case NET_SFTP_HANDLE:
                $handle = substr($response, 4);
                break;
            case NET_SFTP_STATUS:
                $this->logError($response);
                return false;
            default:
                throw new \UnexpectedValueException('Expected NET_SFTP_HANDLE or NET_SFTP_STATUS' .
                                                    'Got packet type: ' . $this->packet_type);
        }

        if (!$this->close_handle($handle)) {
            return false;
        }

        $this->update_stat_cache($dir, []);

        $this->pwd = $dir;
        return true;
    }

    /**
     * Returns a list of files in the given directory
     *
     * @param string $dir
     * @param bool $recursive
     * @return mixed
     * @access public
     */
    public function nlist($dir = '.', $recursive = false)
    {
        return $this->nlist_helper($dir, $recursive, '');
    }

    /**
     * Helper method for nlist
     *
     * @param string $dir
     * @param bool $recursive
     * @param string $relativeDir
     * @return mixed
     * @access private
     */
    private function nlist_helper($dir, $recursive, $relativeDir)
    {
        $files = $this->readlist($dir, false);

        if (!$recursive || $files === false) {
            return $files;
        }

        $result = [];
        foreach ($files as $value) {
            if ($value == '.' || $value == '..') {
                $result[] = $relativeDir . $value;
                continue;
            }
            if (is_array($this->query_stat_cache($this->realpath($dir . '/' . $value)))) {
                $temp = $this->nlist_helper($dir . '/' . $value, true, $relativeDir . $value . '/');
                $temp = is_array($temp) ? $temp : [];
                $result = array_merge($result, $temp);
            } else {
                $result[] = $relativeDir . $value;
            }
        }

        return $result;
    }

    /**
     * Returns a detailed list of files in the given directory
     *
     * @param string $dir
     * @param bool $recursive
     * @return mixed
     * @access public
     */
    public function rawlist($dir = '.', $recursive = false)
    {
        $files = $this->readlist($dir, true);
        if (!$recursive || $files === false) {
            return $files;
        }

        static $depth = 0;

        foreach ($files as $key => $value) {
            if ($depth != 0 && $key == '..') {
                unset($files[$key]);
                continue;
            }
            $is_directory = false;
            if ($key != '.' && $key != '..') {
                if ($this->use_stat_cache) {
                    $is_directory = is_array($this->query_stat_cache($this->realpath($dir . '/' . $key)));
                } else {
                    $stat = $this->lstat($dir . '/' . $key);
                    $is_directory = $stat && $stat['type'] === NET_SFTP_TYPE_DIRECTORY;
                }
            }

            if ($is_directory) {
                $depth++;
                $files[$key] = $this->rawlist($dir . '/' . $key, true);
                $depth--;
            } else {
                $files[$key] = (object) $value;
            }
        }

        return $files;
    }

    /**
     * Reads a list, be it detailed or not, of files in the given directory
     *
     * @param string $dir
     * @param bool $raw
     * @return mixed
     * @throws \UnexpectedValueException on receipt of unexpected packets
     * @access private
     */
    private function readlist($dir, $raw = true)
    {
        if (!($this->bitmap & SSH2::MASK_LOGIN)) {
            return false;
        }

        $dir = $this->realpath($dir . '/');
        if ($dir === false) {
            return false;
        }

        // http://tools.ietf.org/html/draft-ietf-secsh-filexfer-13#section-8.1.2
        if (!$this->send_sftp_packet(NET_SFTP_OPENDIR, Strings::packSSH2('s', $dir))) {
            return false;
        }

        $response = $this->get_sftp_packet();
        switch ($this->packet_type) {
            case NET_SFTP_HANDLE:
                // http://tools.ietf.org/html/draft-ietf-secsh-filexfer-13#section-9.2
                // since 'handle' is the last field in the SSH_FXP_HANDLE packet, we'll just remove the first four bytes that
                // represent the length of the string and leave it at that
                $handle = substr($response, 4);
                break;
            case NET_SFTP_STATUS:
                // presumably SSH_FX_NO_SUCH_FILE or SSH_FX_PERMISSION_DENIED
                $this->logError($response);
                return false;
            default:
                throw new \UnexpectedValueException('Expected NET_SFTP_HANDLE or NET_SFTP_STATUS. '
                                                  . 'Got packet type: ' . $this->packet_type);
        }

        $this->update_stat_cache($dir, []);

        $contents = [];
        while (true) {
            // http://tools.ietf.org/html/draft-ietf-secsh-filexfer-13#section-8.2.2
            // why multiple SSH_FXP_READDIR packets would be sent when the response to a single one can span arbitrarily many
            // SSH_MSG_CHANNEL_DATA messages is not known to me.
            if (!$this->send_sftp_packet(NET_SFTP_READDIR, Strings::packSSH2('s', $handle))) {
                return false;
            }

            $response = $this->get_sftp_packet();
            switch ($this->packet_type) {
                case NET_SFTP_NAME:
                    list($count) = Strings::unpackSSH2('N', $response);
                    for ($i = 0; $i < $count; $i++) {
                        list($shortname, $longname) = Strings::unpackSSH2('ss', $response);
                        $attributes = $this->parseAttributes($response);
                        if (!isset($attributes['type'])) {
                            $fileType = $this->parseLongname($longname);
                            if ($fileType) {
                                $attributes['type'] = $fileType;
                            }
                        }
                        $contents[$shortname] = $attributes + ['filename' => $shortname];

                        if (isset($attributes['type']) && $attributes['type'] == NET_SFTP_TYPE_DIRECTORY && ($shortname != '.' && $shortname != '..')) {
                            $this->update_stat_cache($dir . '/' . $shortname, []);
                        } else {
                            if ($shortname == '..') {
                                $temp = $this->realpath($dir . '/..') . '/.';
                            } else {
                                $temp = $dir . '/' . $shortname;
                            }
                            $this->update_stat_cache($temp, (object) ['lstat' => $attributes]);
                        }
                        // SFTPv6 has an optional boolean end-of-list field, but we'll ignore that, since the
                        // final SSH_FXP_STATUS packet should tell us that, already.
                    }
                    break;
                case NET_SFTP_STATUS:
                    list($status) = Strings::unpackSSH2('N', $response);
                    if ($status != NET_SFTP_STATUS_EOF) {
                        $this->logError($response, $status);
                        return false;
                    }
                    break 2;
                default:
                    throw new \UnexpectedValueException('Expected NET_SFTP_NAME or NET_SFTP_STATUS. '
                                                      . 'Got packet type: ' . $this->packet_type);
            }
        }

        if (!$this->close_handle($handle)) {
            return false;
        }

        if (count($this->sortOptions)) {
            uasort($contents, [&$this, 'comparator']);
        }

        return $raw ? $contents : array_map('strval', array_keys($contents));
    }

    /**
     * Compares two rawlist entries using parameters set by setListOrder()
     *
     * Intended for use with uasort()
     *
     * @param array $a
     * @param array $b
     * @return int
     * @access private
     */
    private function comparator($a, $b)
    {
        switch (true) {
            case $a['filename'] === '.' || $b['filename'] === '.':
                if ($a['filename'] === $b['filename']) {
                    return 0;
                }
                return $a['filename'] === '.' ? -1 : 1;
            case $a['filename'] === '..' || $b['filename'] === '..':
                if ($a['filename'] === $b['filename']) {
                    return 0;
                }
                return $a['filename'] === '..' ? -1 : 1;
            case isset($a['type']) && $a['type'] === NET_SFTP_TYPE_DIRECTORY:
                if (!isset($b['type'])) {
                    return 1;
                }
                if ($b['type'] !== $a['type']) {
                    return -1;
                }
                break;
            case isset($b['type']) && $b['type'] === NET_SFTP_TYPE_DIRECTORY:
                return 1;
        }
        foreach ($this->sortOptions as $sort => $order) {
            if (!isset($a[$sort]) || !isset($b[$sort])) {
                if (isset($a[$sort])) {
                    return -1;
                }
                if (isset($b[$sort])) {
                    return 1;
                }
                return 0;
            }
            switch ($sort) {
                case 'filename':
                    $result = strcasecmp($a['filename'], $b['filename']);
                    if ($result) {
                        return $order === SORT_DESC ? -$result : $result;
                    }
                    break;
                case 'mode':
                    $a[$sort]&= 07777;
                    $b[$sort]&= 07777;
                default:
                    if ($a[$sort] === $b[$sort]) {
                        break;
                    }
                    return $order === SORT_ASC ? $a[$sort] - $b[$sort] : $b[$sort] - $a[$sort];
            }
        }
    }

    /**
     * Defines how nlist() and rawlist() will be sorted - if at all.
     *
     * If sorting is enabled directories and files will be sorted independently with
     * directories appearing before files in the resultant array that is returned.
     *
     * Any parameter returned by stat is a valid sort parameter for this function.
     * Filename comparisons are case insensitive.
     *
     * Examples:
     *
     * $sftp->setListOrder('filename', SORT_ASC);
     * $sftp->setListOrder('size', SORT_DESC, 'filename', SORT_ASC);
     * $sftp->setListOrder(true);
     *    Separates directories from files but doesn't do any sorting beyond that
     * $sftp->setListOrder();
     *    Don't do any sort of sorting
     *
     * @param string[] ...$args
     * @access public
     */
    public function setListOrder(...$args)
    {
        $this->sortOptions = [];
        if (empty($args)) {
            return;
        }
        $len = count($args) & 0x7FFFFFFE;
        for ($i = 0; $i < $len; $i+=2) {
            $this->sortOptions[$args[$i]] = $args[$i + 1];
        }
        if (!count($this->sortOptions)) {
            $this->sortOptions = ['bogus' => true];
        }
    }

    /**
     * Save files / directories to cache
     *
     * @param string $path
     * @param mixed $value
     * @access private
     */
    private function update_stat_cache($path, $value)
    {
        if ($this->use_stat_cache === false) {
            return;
        }

        // preg_replace('#^/|/(?=/)|/$#', '', $dir) == str_replace('//', '/', trim($path, '/'))
        $dirs = explode('/', preg_replace('#^/|/(?=/)|/$#', '', $path));

        $temp = &$this->stat_cache;
        $max = count($dirs) - 1;
        foreach ($dirs as $i => $dir) {
            // if $temp is an object that means one of two things.
            //  1. a file was deleted and changed to a directory behind phpseclib's back
            //  2. it's a symlink. when lstat is done it's unclear what it's a symlink to
            if (is_object($temp)) {
                $temp = [];
            }
            if (!isset($temp[$dir])) {
                $temp[$dir] = [];
            }
            if ($i === $max) {
                if (is_object($temp[$dir]) && is_object($value)) {
                    if (!isset($value->stat) && isset($temp[$dir]->stat)) {
                        $value->stat = $temp[$dir]->stat;
                    }
                    if (!isset($value->lstat) && isset($temp[$dir]->lstat)) {
                        $value->lstat = $temp[$dir]->lstat;
                    }
                }
                $temp[$dir] = $value;
                break;
            }
            $temp = &$temp[$dir];
        }
    }

    /**
     * Remove files / directories from cache
     *
     * @param string $path
     * @return bool
     * @access private
     */
    private function remove_from_stat_cache($path)
    {
        $dirs = explode('/', preg_replace('#^/|/(?=/)|/$#', '', $path));

        $temp = &$this->stat_cache;
        $max = count($dirs) - 1;
        foreach ($dirs as $i => $dir) {
            if (!is_array($temp)) {
                return false;
            }
            if ($i === $max) {
                unset($temp[$dir]);
                return true;
            }
            if (!isset($temp[$dir])) {
                return false;
            }
            $temp = &$temp[$dir];
        }
    }

    /**
     * Checks cache for path
     *
     * Mainly used by file_exists
     *
     * @param string $path
     * @return mixed
     * @access private
     */
    private function query_stat_cache($path)
    {
        $dirs = explode('/', preg_replace('#^/|/(?=/)|/$#', '', $path));

        $temp = &$this->stat_cache;
        foreach ($dirs as $dir) {
            if (!is_array($temp)) {
                return null;
            }
            if (!isset($temp[$dir])) {
                return null;
            }
            $temp = &$temp[$dir];
        }
        return $temp;
    }

    /**
     * Returns general information about a file.
     *
     * Returns an array on success and false otherwise.
     *
     * @param string $filename
     * @return mixed
     * @access public
     */
    public function stat($filename)
    {
        if (!($this->bitmap & SSH2::MASK_LOGIN)) {
            return false;
        }

        $filename = $this->realpath($filename);
        if ($filename === false) {
            return false;
        }

        if ($this->use_stat_cache) {
            $result = $this->query_stat_cache($filename);
            if (is_array($result) && isset($result['.']) && isset($result['.']->stat)) {
                return $result['.']->stat;
            }
            if (is_object($result) && isset($result->stat)) {
                return $result->stat;
            }
        }

        $stat = $this->stat_helper($filename, NET_SFTP_STAT);
        if ($stat === false) {
            $this->remove_from_stat_cache($filename);
            return false;
        }
        if (isset($stat['type'])) {
            if ($stat['type'] == NET_SFTP_TYPE_DIRECTORY) {
                $filename.= '/.';
            }
            $this->update_stat_cache($filename, (object) ['stat' => $stat]);
            return $stat;
        }

        $pwd = $this->pwd;
        $stat['type'] = $this->chdir($filename) ?
            NET_SFTP_TYPE_DIRECTORY :
            NET_SFTP_TYPE_REGULAR;
        $this->pwd = $pwd;

        if ($stat['type'] == NET_SFTP_TYPE_DIRECTORY) {
            $filename.= '/.';
        }
        $this->update_stat_cache($filename, (object) ['stat' => $stat]);

        return $stat;
    }

    /**
     * Returns general information about a file or symbolic link.
     *
     * Returns an array on success and false otherwise.
     *
     * @param string $filename
     * @return mixed
     * @access public
     */
    public function lstat($filename)
    {
        if (!($this->bitmap & SSH2::MASK_LOGIN)) {
            return false;
        }

        $filename = $this->realpath($filename);
        if ($filename === false) {
            return false;
        }

        if ($this->use_stat_cache) {
            $result = $this->query_stat_cache($filename);
            if (is_array($result) && isset($result['.']) && isset($result['.']->lstat)) {
                return $result['.']->lstat;
            }
            if (is_object($result) && isset($result->lstat)) {
                return $result->lstat;
            }
        }

        $lstat = $this->stat_helper($filename, NET_SFTP_LSTAT);
        if ($lstat === false) {
            $this->remove_from_stat_cache($filename);
            return false;
        }
        if (isset($lstat['type'])) {
            if ($lstat['type'] == NET_SFTP_TYPE_DIRECTORY) {
                $filename.= '/.';
            }
            $this->update_stat_cache($filename, (object) ['lstat' => $lstat]);
            return $lstat;
        }

        $stat = $this->stat_helper($filename, NET_SFTP_STAT);

        if ($lstat != $stat) {
            $lstat = array_merge($lstat, ['type' => NET_SFTP_TYPE_SYMLINK]);
            $this->update_stat_cache($filename, (object) ['lstat' => $lstat]);
            return $stat;
        }

        $pwd = $this->pwd;
        $lstat['type'] = $this->chdir($filename) ?
            NET_SFTP_TYPE_DIRECTORY :
            NET_SFTP_TYPE_REGULAR;
        $this->pwd = $pwd;

        if ($lstat['type'] == NET_SFTP_TYPE_DIRECTORY) {
            $filename.= '/.';
        }
        $this->update_stat_cache($filename, (object) ['lstat' => $lstat]);

        return $lstat;
    }

    /**
     * Returns general information about a file or symbolic link
     *
     * Determines information without calling \phpseclib3\Net\SFTP::realpath().
     * The second parameter can be either NET_SFTP_STAT or NET_SFTP_LSTAT.
     *
     * @param string $filename
     * @param int $type
     * @throws \UnexpectedValueException on receipt of unexpected packets
     * @return mixed
     * @access private
     */
    private function stat_helper($filename, $type)
    {
        // SFTPv4+ adds an additional 32-bit integer field - flags - to the following:
        $packet = Strings::packSSH2('s', $filename);
        if (!$this->send_sftp_packet($type, $packet)) {
            return false;
        }

        $response = $this->get_sftp_packet();
        switch ($this->packet_type) {
            case NET_SFTP_ATTRS:
                return $this->parseAttributes($response);
            case NET_SFTP_STATUS:
                $this->logError($response);
                return false;
        }

        throw new \UnexpectedValueException('Expected NET_SFTP_ATTRS or NET_SFTP_STATUS. '
                                          . 'Got packet type: ' . $this->packet_type);
    }

    /**
     * Truncates a file to a given length
     *
     * @param string $filename
     * @param int $new_size
     * @return bool
     * @access public
     */
    public function truncate($filename, $new_size)
    {
        $attr = pack('N3', NET_SFTP_ATTR_SIZE, $new_size / 4294967296, $new_size); // 4294967296 == 0x100000000 == 1<<32

        return $this->setstat($filename, $attr, false);
    }

    /**
     * Sets access and modification time of file.
     *
     * If the file does not exist, it will be created.
     *
     * @param string $filename
     * @param int $time
     * @param int $atime
     * @throws \UnexpectedValueException on receipt of unexpected packets
     * @return bool
     * @access public
     */
    public function touch($filename, $time = null, $atime = null)
    {
        if (!($this->bitmap & SSH2::MASK_LOGIN)) {
            return false;
        }

        $filename = $this->realpath($filename);
        if ($filename === false) {
            return false;
        }

        if (!isset($time)) {
            $time = time();
        }
        if (!isset($atime)) {
            $atime = $time;
        }

        $flags = NET_SFTP_OPEN_WRITE | NET_SFTP_OPEN_CREATE | NET_SFTP_OPEN_EXCL;
        $attr = pack('N3', NET_SFTP_ATTR_ACCESSTIME, $time, $atime);
        $packet = Strings::packSSH2('sN', $filename, $flags) . $attr;
        if (!$this->send_sftp_packet(NET_SFTP_OPEN, $packet)) {
            return false;
        }

        $response = $this->get_sftp_packet();
        switch ($this->packet_type) {
            case NET_SFTP_HANDLE:
                return $this->close_handle(substr($response, 4));
            case NET_SFTP_STATUS:
                $this->logError($response);
                break;
            default:
                throw new \UnexpectedValueException('Expected NET_SFTP_HANDLE or NET_SFTP_STATUS. '
                                                  . 'Got packet type: ' . $this->packet_type);
        }

        return $this->setstat($filename, $attr, false);
    }

    /**
     * Changes file or directory owner
     *
     * Returns true on success or false on error.
     *
     * @param string $filename
     * @param int $uid
     * @param bool $recursive
     * @return bool
     * @access public
     */
    public function chown($filename, $uid, $recursive = false)
    {
        // quoting from <http://www.kernel.org/doc/man-pages/online/pages/man2/chown.2.html>,
        // "if the owner or group is specified as -1, then that ID is not changed"
        $attr = pack('N3', NET_SFTP_ATTR_UIDGID, $uid, -1);

        return $this->setstat($filename, $attr, $recursive);
    }

    /**
     * Changes file or directory group
     *
     * Returns true on success or false on error.
     *
     * @param string $filename
     * @param int $gid
     * @param bool $recursive
     * @return bool
     * @access public
     */
    public function chgrp($filename, $gid, $recursive = false)
    {
        $attr = pack('N3', NET_SFTP_ATTR_UIDGID, -1, $gid);

        return $this->setstat($filename, $attr, $recursive);
    }

    /**
     * Set permissions on a file.
     *
     * Returns the new file permissions on success or false on error.
     * If $recursive is true than this just returns true or false.
     *
     * @param int $mode
     * @param string $filename
     * @param bool $recursive
     * @throws \UnexpectedValueException on receipt of unexpected packets
     * @return mixed
     * @access public
     */
    public function chmod($mode, $filename, $recursive = false)
    {
        if (is_string($mode) && is_int($filename)) {
            $temp = $mode;
            $mode = $filename;
            $filename = $temp;
        }

        $attr = pack('N2', NET_SFTP_ATTR_PERMISSIONS, $mode & 07777);
        if (!$this->setstat($filename, $attr, $recursive)) {
            return false;
        }
        if ($recursive) {
            return true;
        }

        $filename = $this->realpath($filename);
        // rather than return what the permissions *should* be, we'll return what they actually are.  this will also
        // tell us if the file actually exists.
        // incidentally, SFTPv4+ adds an additional 32-bit integer field - flags - to the following:
        $packet = pack('Na*', strlen($filename), $filename);
        if (!$this->send_sftp_packet(NET_SFTP_STAT, $packet)) {
            return false;
        }

        $response = $this->get_sftp_packet();
        switch ($this->packet_type) {
            case NET_SFTP_ATTRS:
                $attrs = $this->parseAttributes($response);
                return $attrs['mode'];
            case NET_SFTP_STATUS:
                $this->logError($response);
                return false;
        }

        throw new \UnexpectedValueException('Expected NET_SFTP_ATTRS or NET_SFTP_STATUS. '
                                          . 'Got packet type: ' . $this->packet_type);
    }

    /**
     * Sets information about a file
     *
     * @param string $filename
     * @param string $attr
     * @param bool $recursive
     * @throws \UnexpectedValueException on receipt of unexpected packets
     * @return bool
     * @access private
     */
    private function setstat($filename, $attr, $recursive)
    {
        if (!($this->bitmap & SSH2::MASK_LOGIN)) {
            return false;
        }

        $filename = $this->realpath($filename);
        if ($filename === false) {
            return false;
        }

        $this->remove_from_stat_cache($filename);

        if ($recursive) {
            $i = 0;
            $result = $this->setstat_recursive($filename, $attr, $i);
            $this->read_put_responses($i);
            return $result;
        }

        // SFTPv4+ has an additional byte field - type - that would need to be sent, as well. setting it to
        // SSH_FILEXFER_TYPE_UNKNOWN might work. if not, we'd have to do an SSH_FXP_STAT before doing an SSH_FXP_SETSTAT.
        if (!$this->send_sftp_packet(NET_SFTP_SETSTAT, Strings::packSSH2('s', $filename) . $attr)) {
            return false;
        }

        /*
         "Because some systems must use separate system calls to set various attributes, it is possible that a failure
          response will be returned, but yet some of the attributes may be have been successfully modified.  If possible,
          servers SHOULD avoid this situation; however, clients MUST be aware that this is possible."

          -- http://tools.ietf.org/html/draft-ietf-secsh-filexfer-13#section-8.6
        */
        $response = $this->get_sftp_packet();
        if ($this->packet_type != NET_SFTP_STATUS) {
            throw new \UnexpectedValueException('Expected NET_SFTP_STATUS. '
                                              . 'Got packet type: ' . $this->packet_type);
        }

        list($status) = Strings::unpackSSH2('N', $response);
        if ($status != NET_SFTP_STATUS_OK) {
            $this->logError($response, $status);
            return false;
        }

        return true;
    }

    /**
     * Recursively sets information on directories on the SFTP server
     *
     * Minimizes directory lookups and SSH_FXP_STATUS requests for speed.
     *
     * @param string $path
     * @param string $attr
     * @param int $i
     * @return bool
     * @access private
     */
    private function setstat_recursive($path, $attr, &$i)
    {
        if (!$this->read_put_responses($i)) {
            return false;
        }
        $i = 0;
        $entries = $this->readlist($path, true);

        if ($entries === false) {
            return $this->setstat($path, $attr, false);
        }

        // normally $entries would have at least . and .. but it might not if the directories
        // permissions didn't allow reading
        if (empty($entries)) {
            return false;
        }

        unset($entries['.'], $entries['..']);
        foreach ($entries as $filename => $props) {
            if (!isset($props['type'])) {
                return false;
            }

            $temp = $path . '/' . $filename;
            if ($props['type'] == NET_SFTP_TYPE_DIRECTORY) {
                if (!$this->setstat_recursive($temp, $attr, $i)) {
                    return false;
                }
            } else {
                if (!$this->send_sftp_packet(NET_SFTP_SETSTAT, Strings::packSSH2('s', $temp) . $attr)) {
                    return false;
                }

                $i++;

                if ($i >= NET_SFTP_QUEUE_SIZE) {
                    if (!$this->read_put_responses($i)) {
                        return false;
                    }
                    $i = 0;
                }
            }
        }

        if (!$this->send_sftp_packet(NET_SFTP_SETSTAT, Strings::packSSH2('s', $path) . $attr)) {
            return false;
        }

        $i++;

        if ($i >= NET_SFTP_QUEUE_SIZE) {
            if (!$this->read_put_responses($i)) {
                return false;
            }
            $i = 0;
        }

        return true;
    }

    /**
     * Return the target of a symbolic link
     *
     * @param string $link
     * @throws \UnexpectedValueException on receipt of unexpected packets
     * @return mixed
     * @access public
     */
    public function readlink($link)
    {
        if (!($this->bitmap & SSH2::MASK_LOGIN)) {
            return false;
        }

        $link = $this->realpath($link);

        if (!$this->send_sftp_packet(NET_SFTP_READLINK, Strings::packSSH2('s', $link))) {
            return false;
        }

        $response = $this->get_sftp_packet();
        switch ($this->packet_type) {
            case NET_SFTP_NAME:
                break;
            case NET_SFTP_STATUS:
                $this->logError($response);
                return false;
            default:
                throw new \UnexpectedValueException('Expected NET_SFTP_NAME or NET_SFTP_STATUS. '
                                                  . 'Got packet type: ' . $this->packet_type);
        }

        list($count) = Strings::unpackSSH2('N', $response);
        // the file isn't a symlink
        if (!$count) {
            return false;
        }

        list($filename) = Strings::unpackSSH2('s', $response);

        return $filename;
    }

    /**
     * Create a symlink
     *
     * symlink() creates a symbolic link to the existing target with the specified name link.
     *
     * @param string $target
     * @param string $link
     * @throws \UnexpectedValueException on receipt of unexpected packets
     * @return bool
     * @access public
     */
    public function symlink($target, $link)
    {
        if (!($this->bitmap & SSH2::MASK_LOGIN)) {
            return false;
        }

        //$target = $this->realpath($target);
        $link = $this->realpath($link);

        $packet = Strings::packSSH2('ss', $target, $link);
        if (!$this->send_sftp_packet(NET_SFTP_SYMLINK, $packet)) {
            return false;
        }

        $response = $this->get_sftp_packet();
        if ($this->packet_type != NET_SFTP_STATUS) {
            throw new \UnexpectedValueException('Expected NET_SFTP_STATUS. '
                                              . 'Got packet type: ' . $this->packet_type);
        }

        list($status) = Strings::unpackSSH2('N', $response);
        if ($status != NET_SFTP_STATUS_OK) {
            $this->logError($response, $status);
            return false;
        }

        return true;
    }

    /**
     * Creates a directory.
     *
     * @param string $dir
     * @param int $mode
     * @param bool $recursive
     * @return bool
     * @access public
     */
    public function mkdir($dir, $mode = -1, $recursive = false)
    {
        if (!($this->bitmap & SSH2::MASK_LOGIN)) {
            return false;
        }

        $dir = $this->realpath($dir);

        if ($recursive) {
            $dirs = explode('/', preg_replace('#/(?=/)|/$#', '', $dir));
            if (empty($dirs[0])) {
                array_shift($dirs);
                $dirs[0] = '/' . $dirs[0];
            }
            for ($i = 0; $i < count($dirs); $i++) {
                $temp = array_slice($dirs, 0, $i + 1);
                $temp = implode('/', $temp);
                $result = $this->mkdir_helper($temp, $mode);
            }
            return $result;
        }

        return $this->mkdir_helper($dir, $mode);
    }

    /**
     * Helper function for directory creation
     *
     * @param string $dir
     * @param int $mode
     * @return bool
     * @access private
     */
    private function mkdir_helper($dir, $mode)
    {
        // send SSH_FXP_MKDIR without any attributes (that's what the \0\0\0\0 is doing)
        if (!$this->send_sftp_packet(NET_SFTP_MKDIR, Strings::packSSH2('s', $dir) . "\0\0\0\0")) {
            return false;
        }

        $response = $this->get_sftp_packet();
        if ($this->packet_type != NET_SFTP_STATUS) {
            throw new \UnexpectedValueException('Expected NET_SFTP_STATUS. '
                                              . 'Got packet type: ' . $this->packet_type);
        }

        list($status) = Strings::unpackSSH2('N', $response);
        if ($status != NET_SFTP_STATUS_OK) {
            $this->logError($response, $status);
            return false;
        }

        if ($mode !== -1) {
            $this->chmod($mode, $dir);
        }

        return true;
    }

    /**
     * Removes a directory.
     *
     * @param string $dir
     * @throws \UnexpectedValueException on receipt of unexpected packets
     * @return bool
     * @access public
     */
    public function rmdir($dir)
    {
        if (!($this->bitmap & SSH2::MASK_LOGIN)) {
            return false;
        }

        $dir = $this->realpath($dir);
        if ($dir === false) {
            return false;
        }

        if (!$this->send_sftp_packet(NET_SFTP_RMDIR, Strings::packSSH2('s', $dir))) {
            return false;
        }

        $response = $this->get_sftp_packet();
        if ($this->packet_type != NET_SFTP_STATUS) {
            throw new \UnexpectedValueException('Expected NET_SFTP_STATUS. '
                                              . 'Got packet type: ' . $this->packet_type);
        }

        list($status) = Strings::unpackSSH2('N', $response);
        if ($status != NET_SFTP_STATUS_OK) {
            // presumably SSH_FX_NO_SUCH_FILE or SSH_FX_PERMISSION_DENIED?
            $this->logError($response, $status);
            return false;
        }

        $this->remove_from_stat_cache($dir);
        // the following will do a soft delete, which would be useful if you deleted a file
        // and then tried to do a stat on the deleted file. the above, in contrast, does
        // a hard delete
        //$this->update_stat_cache($dir, false);

        return true;
    }

    /**
     * Uploads a file to the SFTP server.
     *
     * By default, \phpseclib3\Net\SFTP::put() does not read from the local filesystem.  $data is dumped directly into $remote_file.
     * So, for example, if you set $data to 'filename.ext' and then do \phpseclib3\Net\SFTP::get(), you will get a file, twelve bytes
     * long, containing 'filename.ext' as its contents.
     *
     * Setting $mode to self::SOURCE_LOCAL_FILE will change the above behavior.  With self::SOURCE_LOCAL_FILE, $remote_file will
     * contain as many bytes as filename.ext does on your local filesystem.  If your filename.ext is 1MB then that is how
     * large $remote_file will be, as well.
     *
     * Setting $mode to self::SOURCE_CALLBACK will use $data as callback function, which gets only one parameter -- number of bytes to return, and returns a string if there is some data or null if there is no more data
     *
     * If $data is a resource then it'll be used as a resource instead.
     *
     * Currently, only binary mode is supported.  As such, if the line endings need to be adjusted, you will need to take
     * care of that, yourself.
     *
     * $mode can take an additional two parameters - self::RESUME and self::RESUME_START. These are bitwise AND'd with
     * $mode. So if you want to resume upload of a 300mb file on the local file system you'd set $mode to the following:
     *
     * self::SOURCE_LOCAL_FILE | self::RESUME
     *
     * If you wanted to simply append the full contents of a local file to the full contents of a remote file you'd replace
     * self::RESUME with self::RESUME_START.
     *
     * If $mode & (self::RESUME | self::RESUME_START) then self::RESUME_START will be assumed.
     *
     * $start and $local_start give you more fine grained control over this process and take precident over self::RESUME
     * when they're non-negative. ie. $start could let you write at the end of a file (like self::RESUME) or in the middle
     * of one. $local_start could let you start your reading from the end of a file (like self::RESUME_START) or in the
     * middle of one.
     *
     * Setting $local_start to > 0 or $mode | self::RESUME_START doesn't do anything unless $mode | self::SOURCE_LOCAL_FILE.
     *
     * {@internal ASCII mode for SFTPv4/5/6 can be supported by adding a new function - \phpseclib3\Net\SFTP::setMode().}
     *
     * @param string $remote_file
     * @param string|resource $data
     * @param int $mode
     * @param int $start
     * @param int $local_start
     * @param callable|null $progressCallback
     * @throws \UnexpectedValueException on receipt of unexpected packets
     * @throws \BadFunctionCallException if you're uploading via a callback and the callback function is invalid
     * @throws \phpseclib3\Exception\FileNotFoundException if you're uploading via a file and the file doesn't exist
     * @return bool
     * @access public
     */
    public function put($remote_file, $data, $mode = self::SOURCE_STRING, $start = -1, $local_start = -1, $progressCallback = null)
    {
        if (!($this->bitmap & SSH2::MASK_LOGIN)) {
            return false;
        }

        $remote_file = $this->realpath($remote_file);
        if ($remote_file === false) {
            return false;
        }

        $flags = NET_SFTP_OPEN_WRITE | NET_SFTP_OPEN_CREATE;
        // according to the SFTP specs, NET_SFTP_OPEN_APPEND should "force all writes to append data at the end of the file."
        // in practice, it doesn't seem to do that.
        //$flags|= ($mode & self::RESUME) ? NET_SFTP_OPEN_APPEND : NET_SFTP_OPEN_TRUNCATE;

        if ($start >= 0) {
            $offset = $start;
        } elseif ($mode & self::RESUME) {
            // if NET_SFTP_OPEN_APPEND worked as it should _size() wouldn't need to be called
            $size = $this->stat($remote_file)['size'];
            $offset = $size !== false ? $size : 0;
        } else {
            $offset = 0;
            $flags|= NET_SFTP_OPEN_TRUNCATE;
        }

        $this->remove_from_stat_cache($remote_file);

        $packet = Strings::packSSH2('sNN', $remote_file, $flags, 0);
        if (!$this->send_sftp_packet(NET_SFTP_OPEN, $packet)) {
            return false;
        }

        $response = $this->get_sftp_packet();
        switch ($this->packet_type) {
            case NET_SFTP_HANDLE:
                $handle = substr($response, 4);
                break;
            case NET_SFTP_STATUS:
                $this->logError($response);
                return false;
            default:
                throw new \UnexpectedValueException('Expected NET_SFTP_HANDLE or NET_SFTP_STATUS. '
                                                  . 'Got packet type: ' . $this->packet_type);
        }

        // http://tools.ietf.org/html/draft-ietf-secsh-filexfer-13#section-8.2.3
        $dataCallback = false;
        switch (true) {
            case $mode & self::SOURCE_CALLBACK:
                if (!is_callable($data)) {
                    throw new \BadFunctionCallException("\$data should be is_callable() if you specify SOURCE_CALLBACK flag");
                }
                $dataCallback = $data;
                // do nothing
                break;
            case is_resource($data):
                $mode = $mode & ~self::SOURCE_LOCAL_FILE;
                $info = stream_get_meta_data($data);
                if ($info['wrapper_type'] == 'PHP' && $info['stream_type'] == 'Input') {
                    $fp = fopen('php://memory', 'w+');
                    stream_copy_to_stream($data, $fp);
                    rewind($fp);
                } else {
                    $fp = $data;
                }
                break;
            case $mode & self::SOURCE_LOCAL_FILE:
                if (!is_file($data)) {
                    throw new FileNotFoundException("$data is not a valid file");
                }
                $fp = @fopen($data, 'rb');
                if (!$fp) {
                    return false;
                }
        }

        if (isset($fp)) {
            $stat = fstat($fp);
            $size = !empty($stat) ? $stat['size'] : 0;

            if ($local_start >= 0) {
                fseek($fp, $local_start);
                $size-= $local_start;
            }
        } elseif ($dataCallback) {
            $size = 0;
        } else {
            $size = strlen($data);
        }

        $sent = 0;
        $size = $size < 0 ? ($size & 0x7FFFFFFF) + 0x80000000 : $size;

        $sftp_packet_size = $this->max_sftp_packet;
        // make the SFTP packet be exactly the SFTP packet size by including the bytes in the NET_SFTP_WRITE packets "header"
        $sftp_packet_size-= strlen($handle) + 25;
        $i = $j = 0;
        while ($dataCallback || ($size === 0 || $sent < $size)) {
            if ($dataCallback) {
                $temp = $dataCallback($sftp_packet_size);
                if (is_null($temp)) {
                    break;
                }
            } else {
                $temp = isset($fp) ? fread($fp, $sftp_packet_size) : substr($data, $sent, $sftp_packet_size);
                if ($temp === false || $temp === '') {
                    break;
                }
            }

            $subtemp = $offset + $sent;
            $packet = pack('Na*N3a*', strlen($handle), $handle, $subtemp / 4294967296, $subtemp, strlen($temp), $temp);
            if (!$this->send_sftp_packet(NET_SFTP_WRITE, $packet, $j)) {
                if ($mode & self::SOURCE_LOCAL_FILE) {
                    fclose($fp);
                }
                return false;
            }
            $sent+= strlen($temp);
            if (is_callable($progressCallback)) {
                $progressCallback($sent);
            }

            $i++;
            $j++;
            if ($i == NET_SFTP_UPLOAD_QUEUE_SIZE) {
                if (!$this->read_put_responses($i)) {
                    $i = 0;
                    break;
                }
                $i = 0;
            }
        }

        if (!$this->read_put_responses($i)) {
            if ($mode & self::SOURCE_LOCAL_FILE) {
                fclose($fp);
            }
            $this->close_handle($handle);
            return false;
        }

        if ($mode & self::SOURCE_LOCAL_FILE) {
            if ($this->preserveTime) {
                $stat = fstat($fp);
                $this->touch($remote_file, $stat['mtime'], $stat['atime']);
            }

            if (isset($fp) && is_resource($fp)) {
                fclose($fp);
            }
        }

        return $this->close_handle($handle);
    }

    /**
     * Reads multiple successive SSH_FXP_WRITE responses
     *
     * Sending an SSH_FXP_WRITE packet and immediately reading its response isn't as efficient as blindly sending out $i
     * SSH_FXP_WRITEs, in succession, and then reading $i responses.
     *
     * @param int $i
     * @return bool
     * @throws \UnexpectedValueException on receipt of unexpected packets
     * @access private
     */
    private function read_put_responses($i)
    {
        while ($i--) {
            $response = $this->get_sftp_packet();
            if ($this->packet_type != NET_SFTP_STATUS) {
                throw new \UnexpectedValueException('Expected NET_SFTP_STATUS. '
                                                  . 'Got packet type: ' . $this->packet_type);
            }

            list($status) = Strings::unpackSSH2('N', $response);
            if ($status != NET_SFTP_STATUS_OK) {
                $this->logError($response, $status);
                break;
            }
        }

        return $i < 0;
    }

    /**
     * Close handle
     *
     * @param string $handle
     * @return bool
     * @throws \UnexpectedValueException on receipt of unexpected packets
     * @access private
     */
    private function close_handle($handle)
    {
        if (!$this->send_sftp_packet(NET_SFTP_CLOSE, pack('Na*', strlen($handle), $handle))) {
            return false;
        }

        // "The client MUST release all resources associated with the handle regardless of the status."
        //  -- http://tools.ietf.org/html/draft-ietf-secsh-filexfer-13#section-8.1.3
        $response = $this->get_sftp_packet();
        if ($this->packet_type != NET_SFTP_STATUS) {
            throw new \UnexpectedValueException('Expected NET_SFTP_STATUS. '
                                              . 'Got packet type: ' . $this->packet_type);
        }

        list($status) = Strings::unpackSSH2('N', $response);
        if ($status != NET_SFTP_STATUS_OK) {
            $this->logError($response, $status);
            return false;
        }

        return true;
    }

    /**
     * Downloads a file from the SFTP server.
     *
     * Returns a string containing the contents of $remote_file if $local_file is left undefined or a boolean false if
     * the operation was unsuccessful.  If $local_file is defined, returns true or false depending on the success of the
     * operation.
     *
     * $offset and $length can be used to download files in chunks.
     *
     * @param string $remote_file
     * @param string|bool|resource|callable $local_file
     * @param int $offset
     * @param int $length
     * @param callable|null $progressCallback
     * @throws \UnexpectedValueException on receipt of unexpected packets
     * @return mixed
     * @access public
     */
    public function get($remote_file, $local_file = false, $offset = 0, $length = -1, $progressCallback = null)
    {
        if (!($this->bitmap & SSH2::MASK_LOGIN)) {
            return false;
        }

        $remote_file = $this->realpath($remote_file);
        if ($remote_file === false) {
            return false;
        }

        $packet = pack('Na*N2', strlen($remote_file), $remote_file, NET_SFTP_OPEN_READ, 0);
        if (!$this->send_sftp_packet(NET_SFTP_OPEN, $packet)) {
            return false;
        }

        $response = $this->get_sftp_packet();
        switch ($this->packet_type) {
            case NET_SFTP_HANDLE:
                $handle = substr($response, 4);
                break;
            case NET_SFTP_STATUS: // presumably SSH_FX_NO_SUCH_FILE or SSH_FX_PERMISSION_DENIED
                $this->logError($response);
                return false;
            default:
                throw new \UnexpectedValueException('Expected NET_SFTP_HANDLE or NET_SFTP_STATUS. '
                                                  . 'Got packet type: ' . $this->packet_type);
        }

        if (is_resource($local_file)) {
            $fp = $local_file;
            $stat = fstat($fp);
            $res_offset = $stat['size'];
        } else {
            $res_offset = 0;
            if ($local_file !== false && !is_callable($local_file)) {
                $fp = fopen($local_file, 'wb');
                if (!$fp) {
                    return false;
                }
            } else {
                $content = '';
            }
        }

        $fclose_check = $local_file !== false && !is_callable($local_file) && !is_resource($local_file);

        $start = $offset;
        $read = 0;
        while (true) {
            $i = 0;

            while ($i < NET_SFTP_QUEUE_SIZE && ($length < 0 || $read < $length)) {
                $tempoffset = $start + $read;

                $packet_size = $length > 0 ? min($this->max_sftp_packet, $length - $read) : $this->max_sftp_packet;

                $packet = Strings::packSSH2('sN3', $handle, $tempoffset / 4294967296, $tempoffset, $packet_size);
                if (!$this->send_sftp_packet(NET_SFTP_READ, $packet, $i)) {
                    if ($fclose_check) {
                        fclose($fp);
                    }
                    return false;
                }
                $packet = null;
                $read+= $packet_size;
                $i++;
            }

            if (!$i) {
                break;
            }

            $packets_sent = $i - 1;

            $clear_responses = false;
            while ($i > 0) {
                $i--;

                if ($clear_responses) {
                    $this->get_sftp_packet($packets_sent - $i);
                    continue;
                } else {
                    $response = $this->get_sftp_packet($packets_sent - $i);
                }

                switch ($this->packet_type) {
                    case NET_SFTP_DATA:
                        $temp = substr($response, 4);
                        $offset+= strlen($temp);
                        if ($local_file === false) {
                            $content.= $temp;
                        } elseif (is_callable($local_file)) {
                            $local_file($temp);
                        } else {
                            fputs($fp, $temp);
                        }
                        if (is_callable($progressCallback)) {
                            call_user_func($progressCallback, $offset);
                        }
                        $temp = null;
                        break;
                    case NET_SFTP_STATUS:
                        // could, in theory, return false if !strlen($content) but we'll hold off for the time being
                        $this->logError($response);
                        $clear_responses = true; // don't break out of the loop yet, so we can read the remaining responses
                        break;
                    default:
                        if ($fclose_check) {
                            fclose($fp);
                        }
                        throw new \UnexpectedValueException('Expected NET_SFTP_DATA or NET_SFTP_STATUS. '
                                                          . 'Got packet type: ' . $this->packet_type);
                }
                $response = null;
            }

            if ($clear_responses) {
                break;
            }
        }

        if ($length > 0 && $length <= $offset - $start) {
            if ($local_file === false) {
                $content = substr($content, 0, $length);
            } else {
                ftruncate($fp, $length + $res_offset);
            }
        }

        if ($fclose_check) {
            fclose($fp);

            if ($this->preserveTime) {
                $stat = $this->stat($remote_file);
                touch($local_file, $stat['mtime'], $stat['atime']);
            }
        }

        if (!$this->close_handle($handle)) {
            return false;
        }

        // if $content isn't set that means a file was written to
        return isset($content) ? $content : true;
    }

    /**
     * Deletes a file on the SFTP server.
     *
     * @param string $path
     * @param bool $recursive
     * @return bool
     * @throws \UnexpectedValueException on receipt of unexpected packets
     * @access public
     */
    public function delete($path, $recursive = true)
    {
        if (!($this->bitmap & SSH2::MASK_LOGIN)) {
            return false;
        }

        if (is_object($path)) {
            // It's an object. Cast it as string before we check anything else.
            $path = (string) $path;
        }

        if (!is_string($path) || $path == '') {
            return false;
        }

        $path = $this->realpath($path);
        if ($path === false) {
            return false;
        }

        // http://tools.ietf.org/html/draft-ietf-secsh-filexfer-13#section-8.3
        if (!$this->send_sftp_packet(NET_SFTP_REMOVE, pack('Na*', strlen($path), $path))) {
            return false;
        }

        $response = $this->get_sftp_packet();
        if ($this->packet_type != NET_SFTP_STATUS) {
            throw new \UnexpectedValueException('Expected NET_SFTP_STATUS. '
                                              . 'Got packet type: ' . $this->packet_type);
        }

        // if $status isn't SSH_FX_OK it's probably SSH_FX_NO_SUCH_FILE or SSH_FX_PERMISSION_DENIED
        list($status) = Strings::unpackSSH2('N', $response);
        if ($status != NET_SFTP_STATUS_OK) {
            $this->logError($response, $status);
            if (!$recursive) {
                return false;
            }

            $i = 0;
            $result = $this->delete_recursive($path, $i);
            $this->read_put_responses($i);
            return $result;
        }

        $this->remove_from_stat_cache($path);

        return true;
    }

    /**
     * Recursively deletes directories on the SFTP server
     *
     * Minimizes directory lookups and SSH_FXP_STATUS requests for speed.
     *
     * @param string $path
     * @param int $i
     * @return bool
     * @access private
     */
    private function delete_recursive($path, &$i)
    {
        if (!$this->read_put_responses($i)) {
            return false;
        }
        $i = 0;
        $entries = $this->readlist($path, true);

        // normally $entries would have at least . and .. but it might not if the directories
        // permissions didn't allow reading
        if (empty($entries)) {
            return false;
        }

        unset($entries['.'], $entries['..']);
        foreach ($entries as $filename => $props) {
            if (!isset($props['type'])) {
                return false;
            }

            $temp = $path . '/' . $filename;
            if ($props['type'] == NET_SFTP_TYPE_DIRECTORY) {
                if (!$this->delete_recursive($temp, $i)) {
                    return false;
                }
            } else {
                if (!$this->send_sftp_packet(NET_SFTP_REMOVE, Strings::packSSH2('s', $temp))) {
                    return false;
                }
                $this->remove_from_stat_cache($temp);

                $i++;

                if ($i >= NET_SFTP_QUEUE_SIZE) {
                    if (!$this->read_put_responses($i)) {
                        return false;
                    }
                    $i = 0;
                }
            }
        }

        if (!$this->send_sftp_packet(NET_SFTP_RMDIR, Strings::packSSH2('s', $path))) {
            return false;
        }
        $this->remove_from_stat_cache($path);

        $i++;

        if ($i >= NET_SFTP_QUEUE_SIZE) {
            if (!$this->read_put_responses($i)) {
                return false;
            }
            $i = 0;
        }

        return true;
    }

    /**
     * Checks whether a file or directory exists
     *
     * @param string $path
     * @return bool
     * @access public
     */
    public function file_exists($path)
    {
        if ($this->use_stat_cache) {
            $path = $this->realpath($path);

            $result = $this->query_stat_cache($path);

            if (isset($result)) {
                // return true if $result is an array or if it's an stdClass object
                return $result !== false;
            }
        }

        return $this->stat($path) !== false;
    }

    /**
     * Tells whether the filename is a directory
     *
     * @param string $path
     * @return bool
     * @access public
     */
    public function is_dir($path)
    {
        $result = $this->get_stat_cache_prop($path, 'type');
        if ($result === false) {
            return false;
        }
        return $result === NET_SFTP_TYPE_DIRECTORY;
    }

    /**
     * Tells whether the filename is a regular file
     *
     * @param string $path
     * @return bool
     * @access public
     */
    public function is_file($path)
    {
        $result = $this->get_stat_cache_prop($path, 'type');
        if ($result === false) {
            return false;
        }
        return $result === NET_SFTP_TYPE_REGULAR;
    }

    /**
     * Tells whether the filename is a symbolic link
     *
     * @param string $path
     * @return bool
     * @access public
     */
    public function is_link($path)
    {
        $result = $this->get_lstat_cache_prop($path, 'type');
        if ($result === false) {
            return false;
        }
        return $result === NET_SFTP_TYPE_SYMLINK;
    }

    /**
     * Tells whether a file exists and is readable
     *
     * @param string $path
     * @return bool
     * @access public
     */
    public function is_readable($path)
    {
        $packet = Strings::packSSH2('sNN', $this->realpath($path), NET_SFTP_OPEN_READ, 0);
        if (!$this->send_sftp_packet(NET_SFTP_OPEN, $packet)) {
            return false;
        }

        $response = $this->get_sftp_packet();
        switch ($this->packet_type) {
            case NET_SFTP_HANDLE:
                return true;
            case NET_SFTP_STATUS: // presumably SSH_FX_NO_SUCH_FILE or SSH_FX_PERMISSION_DENIED
                return false;
            default:
                throw new \UnexpectedValueException('Expected NET_SFTP_HANDLE or NET_SFTP_STATUS. '
                                                  . 'Got packet type: ' . $this->packet_type);
        }
    }

    /**
     * Tells whether the filename is writable
     *
     * @param string $path
     * @return bool
     * @access public
     */
    public function is_writable($path)
    {
        $packet = Strings::packSSH2('sNN', $this->realpath($path), NET_SFTP_OPEN_WRITE, 0);
        if (!$this->send_sftp_packet(NET_SFTP_OPEN, $packet)) {
            return false;
        }

        $response = $this->get_sftp_packet();
        switch ($this->packet_type) {
            case NET_SFTP_HANDLE:
                return true;
            case NET_SFTP_STATUS: // presumably SSH_FX_NO_SUCH_FILE or SSH_FX_PERMISSION_DENIED
                return false;
            default:
                throw new \UnexpectedValueException('Expected SSH_FXP_HANDLE or SSH_FXP_STATUS. '
                                                  . 'Got packet type: ' . $this->packet_type);
        }
    }

    /**
     * Tells whether the filename is writeable
     *
     * Alias of is_writable
     *
     * @param string $path
     * @return bool
     * @access public
     */
    public function is_writeable($path)
    {
        return $this->is_writable($path);
    }

    /**
     * Gets last access time of file
     *
     * @param string $path
     * @return mixed
     * @access public
     */
    public function fileatime($path)
    {
        return $this->get_stat_cache_prop($path, 'atime');
    }

    /**
     * Gets file modification time
     *
     * @param string $path
     * @return mixed
     * @access public
     */
    public function filemtime($path)
    {
        return $this->get_stat_cache_prop($path, 'mtime');
    }

    /**
     * Gets file permissions
     *
     * @param string $path
     * @return mixed
     * @access public
     */
    public function fileperms($path)
    {
        return $this->get_stat_cache_prop($path, 'mode');
    }

    /**
     * Gets file owner
     *
     * @param string $path
     * @return mixed
     * @access public
     */
    public function fileowner($path)
    {
        return $this->get_stat_cache_prop($path, 'uid');
    }

    /**
     * Gets file group
     *
     * @param string $path
     * @return mixed
     * @access public
     */
    public function filegroup($path)
    {
        return $this->get_stat_cache_prop($path, 'gid');
    }

    /**
     * Gets file size
     *
     * @param string $path
     * @return mixed
     * @access public
     */
    public function filesize($path)
    {
        return $this->get_stat_cache_prop($path, 'size');
    }

    /**
     * Gets file type
     *
     * @param string $path
     * @return mixed
     * @access public
     */
    public function filetype($path)
    {
        $type = $this->get_stat_cache_prop($path, 'type');
        if ($type === false) {
            return false;
        }

        switch ($type) {
            case NET_SFTP_TYPE_BLOCK_DEVICE:
                return 'block';
            case NET_SFTP_TYPE_CHAR_DEVICE:
                return 'char';
            case NET_SFTP_TYPE_DIRECTORY:
                return 'dir';
            case NET_SFTP_TYPE_FIFO:
                return 'fifo';
            case NET_SFTP_TYPE_REGULAR:
                return 'file';
            case NET_SFTP_TYPE_SYMLINK:
                return 'link';
            default:
                return false;
        }
    }

    /**
     * Return a stat properity
     *
     * Uses cache if appropriate.
     *
     * @param string $path
     * @param string $prop
     * @return mixed
     * @access private
     */
    private function get_stat_cache_prop($path, $prop)
    {
        return $this->get_xstat_cache_prop($path, $prop, 'stat');
    }

    /**
     * Return an lstat properity
     *
     * Uses cache if appropriate.
     *
     * @param string $path
     * @param string $prop
     * @return mixed
     * @access private
     */
    private function get_lstat_cache_prop($path, $prop)
    {
        return $this->get_xstat_cache_prop($path, $prop, 'lstat');
    }

    /**
     * Return a stat or lstat properity
     *
     * Uses cache if appropriate.
     *
     * @param string $path
     * @param string $prop
     * @param string $type
     * @return mixed
     * @access private
     */
    private function get_xstat_cache_prop($path, $prop, $type)
    {
        if ($this->use_stat_cache) {
            $path = $this->realpath($path);

            $result = $this->query_stat_cache($path);

            if (is_object($result) && isset($result->$type)) {
                return $result->{$type}[$prop];
            }
        }

        $result = $this->$type($path);

        if ($result === false || !isset($result[$prop])) {
            return false;
        }

        return $result[$prop];
    }

    /**
     * Renames a file or a directory on the SFTP server
     *
     * @param string $oldname
     * @param string $newname
     * @return bool
     * @throws \UnexpectedValueException on receipt of unexpected packets
     * @access public
     */
    public function rename($oldname, $newname)
    {
        if (!($this->bitmap & SSH2::MASK_LOGIN)) {
            return false;
        }

        $oldname = $this->realpath($oldname);
        $newname = $this->realpath($newname);
        if ($oldname === false || $newname === false) {
            return false;
        }

        // http://tools.ietf.org/html/draft-ietf-secsh-filexfer-13#section-8.3
        $packet = Strings::packSSH2('ss', $oldname, $newname);
        if (!$this->send_sftp_packet(NET_SFTP_RENAME, $packet)) {
            return false;
        }

        $response = $this->get_sftp_packet();
        if ($this->packet_type != NET_SFTP_STATUS) {
            throw new \UnexpectedValueException('Expected NET_SFTP_STATUS. '
                                              . 'Got packet type: ' . $this->packet_type);
        }

        // if $status isn't SSH_FX_OK it's probably SSH_FX_NO_SUCH_FILE or SSH_FX_PERMISSION_DENIED
        list($status) = Strings::unpackSSH2('N', $response);
        if ($status != NET_SFTP_STATUS_OK) {
            $this->logError($response, $status);
            return false;
        }

        // don't move the stat cache entry over since this operation could very well change the
        // atime and mtime attributes
        //$this->update_stat_cache($newname, $this->query_stat_cache($oldname));
        $this->remove_from_stat_cache($oldname);
        $this->remove_from_stat_cache($newname);

        return true;
    }

    /**
     * Parse Attributes
     *
     * See '7.  File Attributes' of draft-ietf-secsh-filexfer-13 for more info.
     *
     * @param string $response
     * @return array
     * @access private
     */
    protected function parseAttributes(&$response)
    {
        $attr = [];
        list($flags) = Strings::unpackSSH2('N', $response);

        // SFTPv4+ have a type field (a byte) that follows the above flag field
        foreach ($this->attributes as $key => $value) {
            switch ($flags & $key) {
                case NET_SFTP_ATTR_SIZE: // 0x00000001
                    // The size attribute is defined as an unsigned 64-bit integer.
                    // The following will use floats on 32-bit platforms, if necessary.
                    // As can be seen in the BigInteger class, floats are generally
                    // IEEE 754 binary64 "double precision" on such platforms and
                    // as such can represent integers of at least 2^50 without loss
                    // of precision. Interpreted in filesize, 2^50 bytes = 1024 TiB.
                    list($upper, $size) = Strings::unpackSSH2('NN', $response);
                    $attr['size'] = $upper ? 4294967296 * $upper : 0;
                    $attr['size']+= $size < 0 ? ($size & 0x7FFFFFFF) + 0x80000000 : $size;
                    break;
                case NET_SFTP_ATTR_UIDGID: // 0x00000002 (SFTPv3 only)
                    list($attr['uid'], $attr['gid']) = Strings::unpackSSH2('NN', $response);
                    break;
                case NET_SFTP_ATTR_PERMISSIONS: // 0x00000004
                    list($attr['mode']) = Strings::unpackSSH2('N', $response);
                    $fileType = $this->parseMode($attr['mode']);
                    if ($fileType !== false) {
                        $attr+= ['type' => $fileType];
                    }
                    break;
                case NET_SFTP_ATTR_ACCESSTIME: // 0x00000008
                    list($attr['atime'], $attr['mtime']) = Strings::unpackSSH2('NN', $response);
                    break;
                case NET_SFTP_ATTR_EXTENDED: // 0x80000000
                    list($count) = Strings::unpackSSH2('N', $response);
                    for ($i = 0; $i < $count; $i++) {
                        list($key, $value) = Strings::unpackSSH2('ss', $response);
                        $attr[$key] = $value;
                    }
            }
        }
        return $attr;
    }

    /**
     * Attempt to identify the file type
     *
     * Quoting the SFTP RFC, "Implementations MUST NOT send bits that are not defined" but they seem to anyway
     *
     * @param int $mode
     * @return int
     * @access private
     */
    private function parseMode($mode)
    {
        // values come from http://lxr.free-electrons.com/source/include/uapi/linux/stat.h#L12
        // see, also, http://linux.die.net/man/2/stat
        switch ($mode & 0170000) {// ie. 1111 0000 0000 0000
            case 0000000: // no file type specified - figure out the file type using alternative means
                return false;
            case 0040000:
                return NET_SFTP_TYPE_DIRECTORY;
            case 0100000:
                return NET_SFTP_TYPE_REGULAR;
            case 0120000:
                return NET_SFTP_TYPE_SYMLINK;
            // new types introduced in SFTPv5+
            // http://tools.ietf.org/html/draft-ietf-secsh-filexfer-05#section-5.2
            case 0010000: // named pipe (fifo)
                return NET_SFTP_TYPE_FIFO;
            case 0020000: // character special
                return NET_SFTP_TYPE_CHAR_DEVICE;
            case 0060000: // block special
                return NET_SFTP_TYPE_BLOCK_DEVICE;
            case 0140000: // socket
                return NET_SFTP_TYPE_SOCKET;
            case 0160000: // whiteout
                // "SPECIAL should be used for files that are of
                //  a known type which cannot be expressed in the protocol"
                return NET_SFTP_TYPE_SPECIAL;
            default:
                return NET_SFTP_TYPE_UNKNOWN;
        }
    }

    /**
     * Parse Longname
     *
     * SFTPv3 doesn't provide any easy way of identifying a file type.  You could try to open
     * a file as a directory and see if an error is returned or you could try to parse the
     * SFTPv3-specific longname field of the SSH_FXP_NAME packet.  That's what this function does.
     * The result is returned using the
     * {@link http://tools.ietf.org/html/draft-ietf-secsh-filexfer-04#section-5.2 SFTPv4 type constants}.
     *
     * If the longname is in an unrecognized format bool(false) is returned.
     *
     * @param string $longname
     * @return mixed
     * @access private
     */
    private function parseLongname($longname)
    {
        // http://en.wikipedia.org/wiki/Unix_file_types
        // http://en.wikipedia.org/wiki/Filesystem_permissions#Notation_of_traditional_Unix_permissions
        if (preg_match('#^[^/]([r-][w-][xstST-]){3}#', $longname)) {
            switch ($longname[0]) {
                case '-':
                    return NET_SFTP_TYPE_REGULAR;
                case 'd':
                    return NET_SFTP_TYPE_DIRECTORY;
                case 'l':
                    return NET_SFTP_TYPE_SYMLINK;
                default:
                    return NET_SFTP_TYPE_SPECIAL;
            }
        }

        return false;
    }

    /**
     * Sends SFTP Packets
     *
     * See '6. General Packet Format' of draft-ietf-secsh-filexfer-13 for more info.
     *
     * @param int $type
     * @param string $data
     * @param int $request_id
     * @see self::_get_sftp_packet()
     * @see self::send_channel_packet()
     * @return bool
     * @access private
     */
    private function send_sftp_packet($type, $data, $request_id = 1)
    {
        // in SSH2.php the timeout is cumulative per function call. eg. exec() will
        // timeout after 10s. but for SFTP.php it's cumulative per packet
        $this->curTimeout = $this->timeout;

        $packet = $this->use_request_id ?
            pack('NCNa*', strlen($data) + 5, $type, $request_id, $data) :
            pack('NCa*',  strlen($data) + 1, $type, $data);

        $start = microtime(true);
        $result = $this->send_channel_packet(self::CHANNEL, $packet);
        $stop = microtime(true);

        if (defined('NET_SFTP_LOGGING')) {
            $packet_type = '-> ' . $this->packet_types[$type] .
                           ' (' . round($stop - $start, 4) . 's)';
            if (NET_SFTP_LOGGING == self::LOG_REALTIME) {
                switch (PHP_SAPI) {
                    case 'cli':
                        $start = $stop = "\r\n";
                        break;
                    default:
                        $start = '<pre>';
                        $stop = '</pre>';
                }
                echo $start . $this->format_log([$data], [$packet_type]) . $stop;
                @flush();
                @ob_flush();
            } else {
                $this->packet_type_log[] = $packet_type;
                if (NET_SFTP_LOGGING == self::LOG_COMPLEX) {
                    $this->packet_log[] = $data;
                }
            }
        }

        return $result;
    }

    /**
     * Resets a connection for re-use
     *
     * @param int $reason
     * @access private
     */
    protected function reset_connection($reason)
    {
        parent::reset_connection($reason);
        $this->use_request_id = false;
        $this->pwd = false;
        $this->requestBuffer = [];
    }

    /**
     * Receives SFTP Packets
     *
     * See '6. General Packet Format' of draft-ietf-secsh-filexfer-13 for more info.
     *
     * Incidentally, the number of SSH_MSG_CHANNEL_DATA messages has no bearing on the number of SFTP packets present.
     * There can be one SSH_MSG_CHANNEL_DATA messages containing two SFTP packets or there can be two SSH_MSG_CHANNEL_DATA
     * messages containing one SFTP packet.
     *
     * @see self::_send_sftp_packet()
     * @return string
     * @access private
     */
    private function get_sftp_packet($request_id = null)
    {
        if (isset($request_id) && isset($this->requestBuffer[$request_id])) {
            $this->packet_type = $this->requestBuffer[$request_id]['packet_type'];
            $temp = $this->requestBuffer[$request_id]['packet'];
            unset($this->requestBuffer[$request_id]);
            return $temp;
        }

        // in SSH2.php the timeout is cumulative per function call. eg. exec() will
        // timeout after 10s. but for SFTP.php it's cumulative per packet
        $this->curTimeout = $this->timeout;

        $start = microtime(true);

        // SFTP packet length
        while (strlen($this->packet_buffer) < 4) {
            $temp = $this->get_channel_packet(self::CHANNEL, true);
            if (is_bool($temp)) {
                $this->packet_type = false;
                $this->packet_buffer = '';
                return false;
            }
            $this->packet_buffer.= $temp;
        }
        if (strlen($this->packet_buffer) < 4) {
            return false;
        }
        extract(unpack('Nlength', Strings::shift($this->packet_buffer, 4)));
        /** @var integer $length */

        $tempLength = $length;
        $tempLength-= strlen($this->packet_buffer);

        // 256 * 1024 is what SFTP_MAX_MSG_LENGTH is set to in OpenSSH's sftp-common.h
        if ($tempLength > 256 * 1024) {
            throw new \RuntimeException('Invalid Size');
        }

        // SFTP packet type and data payload
        while ($tempLength > 0) {
            $temp = $this->get_channel_packet(self::CHANNEL, true);
            if (is_bool($temp)) {
                $this->packet_type = false;
                $this->packet_buffer = '';
                return false;
            }
            $this->packet_buffer.= $temp;
            $tempLength-= strlen($temp);
        }

        $stop = microtime(true);

        $this->packet_type = ord(Strings::shift($this->packet_buffer));

        if ($this->use_request_id) {
            extract(unpack('Npacket_id', Strings::shift($this->packet_buffer, 4))); // remove the request id
            $length-= 5; // account for the request id and the packet type
        } else {
            $length-= 1; // account for the packet type
        }

        $packet = Strings::shift($this->packet_buffer, $length);

        if (defined('NET_SFTP_LOGGING')) {
            $packet_type = '<- ' . $this->packet_types[$this->packet_type] .
                           ' (' . round($stop - $start, 4) . 's)';
            if (NET_SFTP_LOGGING == self::LOG_REALTIME) {
                switch (PHP_SAPI) {
                    case 'cli':
                        $start = $stop = "\r\n";
                        break;
                    default:
                        $start = '<pre>';
                        $stop = '</pre>';
                }
                echo $start . $this->format_log([$packet], [$packet_type]) . $stop;
                @flush();
                @ob_flush();
            } else {
                $this->packet_type_log[] = $packet_type;
                if (NET_SFTP_LOGGING == self::LOG_COMPLEX) {
                    $this->packet_log[] = $packet;
                }
            }
        }

        if (isset($request_id) && $this->use_request_id && $packet_id != $request_id) {
            $this->requestBuffer[$packet_id] = array(
                'packet_type' => $this->packet_type,
                'packet' => $packet
            );
            return $this->get_sftp_packet($request_id);
        }

        return $packet;
    }

    /**
     * Returns a log of the packets that have been sent and received.
     *
     * Returns a string if NET_SFTP_LOGGING == self::LOG_COMPLEX, an array if NET_SFTP_LOGGING == self::LOG_SIMPLE and false if !defined('NET_SFTP_LOGGING')
     *
     * @access public
     * @return array|string
     */
    public function getSFTPLog()
    {
        if (!defined('NET_SFTP_LOGGING')) {
            return false;
        }

        switch (NET_SFTP_LOGGING) {
            case self::LOG_COMPLEX:
                return $this->format_log($this->packet_log, $this->packet_type_log);
                break;
            //case self::LOG_SIMPLE:
            default:
                return $this->packet_type_log;
        }
    }

    /**
     * Returns all errors
     *
     * @return array
     * @access public
     */
    public function getSFTPErrors()
    {
        return $this->sftp_errors;
    }

    /**
     * Returns the last error
     *
     * @return string
     * @access public
     */
    public function getLastSFTPError()
    {
        return count($this->sftp_errors) ? $this->sftp_errors[count($this->sftp_errors) - 1] : '';
    }

    /**
     * Get supported SFTP versions
     *
     * @return array
     * @access public
     */
    public function getSupportedVersions()
    {
        $temp = ['version' => $this->version];
        if (isset($this->extensions['versions'])) {
            $temp['extensions'] = $this->extensions['versions'];
        }
        return $temp;
    }

    /**
     * Disconnect
     *
     * @param int $reason
     * @return bool
     * @access protected
     */
    protected function disconnect_helper($reason)
    {
        $this->pwd = false;
        parent::disconnect_helper($reason);
    }

    /**
     * Enable Date Preservation
     *
     * @access public
     */
    function enableDatePreservation()
    {
        $this->preserveTime = true;
    }

    /**
     * Disable Date Preservation
     *
     * @access public
     */
    function disableDatePreservation()
    {
        $this->preserveTime = false;
    }
}
