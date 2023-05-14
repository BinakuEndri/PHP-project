<?php
/**
 * ContactActivity
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  ElasticEmail
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Elastic Email REST API
 *
 * This API is based on the REST API architecture, allowing the user to easily manage their data with this resource-based approach.    Every API call is established on which specific request type (GET, POST, PUT, DELETE) will be used.    The API has a limit of 20 concurrent connections and a hard timeout of 600 seconds per request.    To start using this API, you will need your Access Token (available <a target=\"_blank\" href=\"https://app.elasticemail.com/marketing/settings/new/manage-api\">here</a>). Remember to keep it safe. Required access levels are listed in the given request’s description.    Downloadable library clients can be found in our Github repository <a target=\"_blank\" href=\"https://github.com/ElasticEmail?tab=repositories&q=%22rest+api%22+in%3Areadme\">here</a>
 *
 * The version of the OpenAPI document: 4.0.0
 * Contact: support@elasticemail.com
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.2.1
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace ElasticEmail\Model;

use \ArrayAccess;
use \ElasticEmail\ObjectSerializer;

/**
 * ContactActivity Class Doc Comment
 *
 * @category Class
 * @package  ElasticEmail
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class ContactActivity implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'ContactActivity';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'total_sent' => 'int',
        'total_opened' => 'int',
        'total_clicked' => 'int',
        'total_failed' => 'int',
        'last_sent' => '\DateTime',
        'last_opened' => '\DateTime',
        'last_clicked' => '\DateTime',
        'last_failed' => '\DateTime',
        'last_ip' => 'string',
        'error_code' => 'int',
        'friendly_error_message' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'total_sent' => 'int32',
        'total_opened' => 'int32',
        'total_clicked' => 'int32',
        'total_failed' => 'int32',
        'last_sent' => 'date-time',
        'last_opened' => 'date-time',
        'last_clicked' => 'date-time',
        'last_failed' => 'date-time',
        'last_ip' => 'string',
        'error_code' => 'int32',
        'friendly_error_message' => 'string'
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'total_sent' => false,
		'total_opened' => false,
		'total_clicked' => false,
		'total_failed' => false,
		'last_sent' => true,
		'last_opened' => true,
		'last_clicked' => true,
		'last_failed' => true,
		'last_ip' => false,
		'error_code' => true,
		'friendly_error_message' => false
    ];

    /**
      * If a nullable field gets set to null, insert it here
      *
      * @var boolean[]
      */
    protected array $openAPINullablesSetToNull = [];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of nullable properties
     *
     * @return array
     */
    protected static function openAPINullables(): array
    {
        return self::$openAPINullables;
    }

    /**
     * Array of nullable field names deliberately set to null
     *
     * @return boolean[]
     */
    private function getOpenAPINullablesSetToNull(): array
    {
        return $this->openAPINullablesSetToNull;
    }

    /**
     * Setter - Array of nullable field names deliberately set to null
     *
     * @param boolean[] $openAPINullablesSetToNull
     */
    private function setOpenAPINullablesSetToNull(array $openAPINullablesSetToNull): void
    {
        $this->openAPINullablesSetToNull = $openAPINullablesSetToNull;
    }

    /**
     * Checks if a property is nullable
     *
     * @param string $property
     * @return bool
     */
    public static function isNullable(string $property): bool
    {
        return self::openAPINullables()[$property] ?? false;
    }

    /**
     * Checks if a nullable property is set to null.
     *
     * @param string $property
     * @return bool
     */
    public function isNullableSetToNull(string $property): bool
    {
        return in_array($property, $this->getOpenAPINullablesSetToNull(), true);
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'total_sent' => 'TotalSent',
        'total_opened' => 'TotalOpened',
        'total_clicked' => 'TotalClicked',
        'total_failed' => 'TotalFailed',
        'last_sent' => 'LastSent',
        'last_opened' => 'LastOpened',
        'last_clicked' => 'LastClicked',
        'last_failed' => 'LastFailed',
        'last_ip' => 'LastIP',
        'error_code' => 'ErrorCode',
        'friendly_error_message' => 'FriendlyErrorMessage'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'total_sent' => 'setTotalSent',
        'total_opened' => 'setTotalOpened',
        'total_clicked' => 'setTotalClicked',
        'total_failed' => 'setTotalFailed',
        'last_sent' => 'setLastSent',
        'last_opened' => 'setLastOpened',
        'last_clicked' => 'setLastClicked',
        'last_failed' => 'setLastFailed',
        'last_ip' => 'setLastIp',
        'error_code' => 'setErrorCode',
        'friendly_error_message' => 'setFriendlyErrorMessage'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'total_sent' => 'getTotalSent',
        'total_opened' => 'getTotalOpened',
        'total_clicked' => 'getTotalClicked',
        'total_failed' => 'getTotalFailed',
        'last_sent' => 'getLastSent',
        'last_opened' => 'getLastOpened',
        'last_clicked' => 'getLastClicked',
        'last_failed' => 'getLastFailed',
        'last_ip' => 'getLastIp',
        'error_code' => 'getErrorCode',
        'friendly_error_message' => 'getFriendlyErrorMessage'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }


    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->setIfExists('total_sent', $data ?? [], null);
        $this->setIfExists('total_opened', $data ?? [], null);
        $this->setIfExists('total_clicked', $data ?? [], null);
        $this->setIfExists('total_failed', $data ?? [], null);
        $this->setIfExists('last_sent', $data ?? [], null);
        $this->setIfExists('last_opened', $data ?? [], null);
        $this->setIfExists('last_clicked', $data ?? [], null);
        $this->setIfExists('last_failed', $data ?? [], null);
        $this->setIfExists('last_ip', $data ?? [], null);
        $this->setIfExists('error_code', $data ?? [], null);
        $this->setIfExists('friendly_error_message', $data ?? [], null);
    }

    /**
    * Sets $this->container[$variableName] to the given data or to the given default Value; if $variableName
    * is nullable and its value is set to null in the $fields array, then mark it as "set to null" in the
    * $this->openAPINullablesSetToNull array
    *
    * @param string $variableName
    * @param array  $fields
    * @param mixed  $defaultValue
    */
    private function setIfExists(string $variableName, array $fields, $defaultValue): void
    {
        if (self::isNullable($variableName) && array_key_exists($variableName, $fields) && is_null($fields[$variableName])) {
            $this->openAPINullablesSetToNull[] = $variableName;
        }

        $this->container[$variableName] = $fields[$variableName] ?? $defaultValue;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets total_sent
     *
     * @return int|null
     */
    public function getTotalSent()
    {
        return $this->container['total_sent'];
    }

    /**
     * Sets total_sent
     *
     * @param int|null $total_sent Total emails sent.
     *
     * @return self
     */
    public function setTotalSent($total_sent)
    {

        if (is_null($total_sent)) {
            throw new \InvalidArgumentException('non-nullable total_sent cannot be null');
        }

        $this->container['total_sent'] = $total_sent;

        return $this;
    }

    /**
     * Gets total_opened
     *
     * @return int|null
     */
    public function getTotalOpened()
    {
        return $this->container['total_opened'];
    }

    /**
     * Sets total_opened
     *
     * @param int|null $total_opened Total emails opened.
     *
     * @return self
     */
    public function setTotalOpened($total_opened)
    {

        if (is_null($total_opened)) {
            throw new \InvalidArgumentException('non-nullable total_opened cannot be null');
        }

        $this->container['total_opened'] = $total_opened;

        return $this;
    }

    /**
     * Gets total_clicked
     *
     * @return int|null
     */
    public function getTotalClicked()
    {
        return $this->container['total_clicked'];
    }

    /**
     * Sets total_clicked
     *
     * @param int|null $total_clicked Total emails clicked
     *
     * @return self
     */
    public function setTotalClicked($total_clicked)
    {

        if (is_null($total_clicked)) {
            throw new \InvalidArgumentException('non-nullable total_clicked cannot be null');
        }

        $this->container['total_clicked'] = $total_clicked;

        return $this;
    }

    /**
     * Gets total_failed
     *
     * @return int|null
     */
    public function getTotalFailed()
    {
        return $this->container['total_failed'];
    }

    /**
     * Sets total_failed
     *
     * @param int|null $total_failed Total emails failed.
     *
     * @return self
     */
    public function setTotalFailed($total_failed)
    {

        if (is_null($total_failed)) {
            throw new \InvalidArgumentException('non-nullable total_failed cannot be null');
        }

        $this->container['total_failed'] = $total_failed;

        return $this;
    }

    /**
     * Gets last_sent
     *
     * @return \DateTime|null
     */
    public function getLastSent()
    {
        return $this->container['last_sent'];
    }

    /**
     * Sets last_sent
     *
     * @param \DateTime|null $last_sent Last date when an email was sent to this contact
     *
     * @return self
     */
    public function setLastSent($last_sent)
    {

        if (is_null($last_sent)) {
            array_push($this->openAPINullablesSetToNull, 'last_sent');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('last_sent', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['last_sent'] = $last_sent;

        return $this;
    }

    /**
     * Gets last_opened
     *
     * @return \DateTime|null
     */
    public function getLastOpened()
    {
        return $this->container['last_opened'];
    }

    /**
     * Sets last_opened
     *
     * @param \DateTime|null $last_opened Date this contact last opened an email
     *
     * @return self
     */
    public function setLastOpened($last_opened)
    {

        if (is_null($last_opened)) {
            array_push($this->openAPINullablesSetToNull, 'last_opened');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('last_opened', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['last_opened'] = $last_opened;

        return $this;
    }

    /**
     * Gets last_clicked
     *
     * @return \DateTime|null
     */
    public function getLastClicked()
    {
        return $this->container['last_clicked'];
    }

    /**
     * Sets last_clicked
     *
     * @param \DateTime|null $last_clicked Date this contact last clicked an email
     *
     * @return self
     */
    public function setLastClicked($last_clicked)
    {

        if (is_null($last_clicked)) {
            array_push($this->openAPINullablesSetToNull, 'last_clicked');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('last_clicked', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['last_clicked'] = $last_clicked;

        return $this;
    }

    /**
     * Gets last_failed
     *
     * @return \DateTime|null
     */
    public function getLastFailed()
    {
        return $this->container['last_failed'];
    }

    /**
     * Sets last_failed
     *
     * @param \DateTime|null $last_failed Last date when an email sent to this contact bounced
     *
     * @return self
     */
    public function setLastFailed($last_failed)
    {

        if (is_null($last_failed)) {
            array_push($this->openAPINullablesSetToNull, 'last_failed');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('last_failed', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['last_failed'] = $last_failed;

        return $this;
    }

    /**
     * Gets last_ip
     *
     * @return string|null
     */
    public function getLastIp()
    {
        return $this->container['last_ip'];
    }

    /**
     * Sets last_ip
     *
     * @param string|null $last_ip IP from which this contact opened or clicked their email last time
     *
     * @return self
     */
    public function setLastIp($last_ip)
    {

        if (is_null($last_ip)) {
            throw new \InvalidArgumentException('non-nullable last_ip cannot be null');
        }

        $this->container['last_ip'] = $last_ip;

        return $this;
    }

    /**
     * Gets error_code
     *
     * @return int|null
     */
    public function getErrorCode()
    {
        return $this->container['error_code'];
    }

    /**
     * Sets error_code
     *
     * @param int|null $error_code Last RFC Error code if any occurred
     *
     * @return self
     */
    public function setErrorCode($error_code)
    {

        if (is_null($error_code)) {
            array_push($this->openAPINullablesSetToNull, 'error_code');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('error_code', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['error_code'] = $error_code;

        return $this;
    }

    /**
     * Gets friendly_error_message
     *
     * @return string|null
     */
    public function getFriendlyErrorMessage()
    {
        return $this->container['friendly_error_message'];
    }

    /**
     * Sets friendly_error_message
     *
     * @param string|null $friendly_error_message Last RFC error message if any occurred
     *
     * @return self
     */
    public function setFriendlyErrorMessage($friendly_error_message)
    {

        if (is_null($friendly_error_message)) {
            throw new \InvalidArgumentException('non-nullable friendly_error_message cannot be null');
        }

        $this->container['friendly_error_message'] = $friendly_error_message;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


