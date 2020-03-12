<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebsiteURL extends Model
{
    protected $fillable = ['oldurl', 'newurl','metatitle','metadiscription','metakeyword','ogtitle','ogdiscription','fburl','ogimage','canonicalurl','twittersite','twittertitle','twiterdiscription','Schema','hreflang'];
}
