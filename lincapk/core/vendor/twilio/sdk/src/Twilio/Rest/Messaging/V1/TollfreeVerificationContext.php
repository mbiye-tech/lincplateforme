<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Messaging\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
class TollfreeVerificationContext extends InstanceContext {
    /**
     * Initialize the TollfreeVerificationContext
     *
     * @param Version $version Version that contains the resource
     * @param string $sid Tollfree Verification Sid
     */
    public function __construct(Version $version, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = ['sid' => $sid, ];

        $this->uri = '/Tollfree/Verifications/' . \rawurlencode($sid) . '';
    }

    /**
     * Fetch the TollfreeVerificationInstance
     *
     * @return TollfreeVerificationInstance Fetched TollfreeVerificationInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(): TollfreeVerificationInstance {
        $payload = $this->version->fetch('GET', $this->uri);

        return new TollfreeVerificationInstance($this->version, $payload, $this->solution['sid']);
    }

    /**
     * Update the TollfreeVerificationInstance
     *
     * @param array|Options $options Optional Arguments
     * @return TollfreeVerificationInstance Updated TollfreeVerificationInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []): TollfreeVerificationInstance {
        $options = new Values($options);

        $data = Values::of([
            'BusinessName' => $options['businessName'],
            'BusinessWebsite' => $options['businessWebsite'],
            'NotificationEmail' => $options['notificationEmail'],
            'UseCaseCategories' => Serialize::map($options['useCaseCategories'], function($e) { return $e; }),
            'UseCaseSummary' => $options['useCaseSummary'],
            'ProductionMessageSample' => $options['productionMessageSample'],
            'OptInImageUrls' => Serialize::map($options['optInImageUrls'], function($e) { return $e; }),
            'OptInType' => $options['optInType'],
            'MessageVolume' => $options['messageVolume'],
            'BusinessStreetAddress' => $options['businessStreetAddress'],
            'BusinessStreetAddress2' => $options['businessStreetAddress2'],
            'BusinessCity' => $options['businessCity'],
            'BusinessStateProvinceRegion' => $options['businessStateProvinceRegion'],
            'BusinessPostalCode' => $options['businessPostalCode'],
            'BusinessCountry' => $options['businessCountry'],
            'AdditionalInformation' => $options['additionalInformation'],
            'BusinessContactFirstName' => $options['businessContactFirstName'],
            'BusinessContactLastName' => $options['businessContactLastName'],
            'BusinessContactEmail' => $options['businessContactEmail'],
            'BusinessContactPhone' => $options['businessContactPhone'],
        ]);

        $payload = $this->version->update('POST', $this->uri, [], $data);

        return new TollfreeVerificationInstance($this->version, $payload, $this->solution['sid']);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        $context = [];
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Messaging.V1.TollfreeVerificationContext ' . \implode(' ', $context) . ']';
    }
}