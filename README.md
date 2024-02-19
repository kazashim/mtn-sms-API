# PHP Script for MTN API - Token Retrieval and SMS Sending

This PHP script demonstrates how to retrieve an access token using the Client Credentials OAuth Flow and how to send an SMS message using the MTN API.

## Prerequisites

Before running this script, ensure you have the following:

- PHP installed on your system.
- Access to the MTN API.
- Client ID and Client Secret provided by MTN.

## Usage

1. Update the `client_id` and `client_secret` variables in the script with your actual credentials provided by MTN.

2. Run the script using PHP on your command line or in a web server environment.

3. Upon execution, the script will first retrieve an access token from the MTN API using the Client Credentials OAuth Flow.

4. Then, it will use the obtained access token to send an SMS message to the specified recipients.

## Configuration

The script uses the following configuration parameters:

- `client_id`: Your MTN API client ID.
- `client_secret`: Your MTN API client secret.
- `sms_url`: URL for sending SMS messages.
- `senderAddress`: Sender address displayed on the recipient's device.
- `receiverAddress`: Array of recipient MSISDN(s).
- `message`: Content of the SMS message.
- `clientCorrelatorId`: Unique identifier for the request.
- `serviceCode`: Short code provided by the API consumer.
- `requestDeliveryReceipt`: Boolean indicating whether delivery receipt is requested.

## Response

Upon sending the SMS message, the script will display the response received from the MTN API, including any error messages or status information.

## Developer Information

- **Developer**: Kazashim Kuzasuwat
- **Email**: kazashim@cynojine.online
- **GitHub**: kazashim

## Disclaimer

This script is provided as a sample and may require further customization based on your specific requirements and environment. Use it responsibly and ensure compliance with MTN API usage policies and terms of service.

For more information, refer to the [MTN Developer Portal](https://developer.mtn.com/) and the official [MTN API documentation](https://developer.mtn.com/docs/overview).
