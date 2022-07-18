<?php

namespace bSecure\Payments\Models;

use Exception;
use Illuminate\Database\Eloquent\Model;

class ClientApp extends Model
{
    public static function verifyAppCredentials($merchantClientId, $merchantClientSecret)
    {
        try {
            if (empty($merchantClientId)) {
                return ['client_id' => '', 'error' => true, 'message' => trans('bSecurePayments::messages.client.id.invalid')];
            } else if (empty($merchantClientSecret)) {
                return ['client_id' => '', 'error' => true, 'message' => trans('bSecurePayments::messages.client.secret.invalid')];
            } else {
                return [
                    'client_id' => $merchantClientId,
                    'client_secret' => $merchantClientSecret,
                    'error' => false,
                ];
            }
        } catch (Exception $e) {
            return ['client_id' => '', 'error' => true, 'message' => $e->getTraceAsString()];
        }
    }
}
