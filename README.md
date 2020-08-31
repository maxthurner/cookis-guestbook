# [Cookis - Guestbook]


## Status

[![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg)](https://raw.githubusercontent.com/BlackrockDigital/startbootstrap-scrolling-nav/master/LICENSE)
[![npm version](https://img.shields.io/npm/v/startbootstrap-scrolling-nav.svg)](https://www.npmjs.com/package/startbootstrap-scrolling-nav)
[![Build Status](https://travis-ci.org/BlackrockDigital/startbootstrap-scrolling-nav.svg?branch=master)](https://travis-ci.org/BlackrockDigital/startbootstrap-scrolling-nav)
[![dependencies Status](https://david-dm.org/BlackrockDigital/startbootstrap-scrolling-nav/status.svg)](https://david-dm.org/BlackrockDigital/startbootstrap-scrolling-nav)
[![devDependencies Status](https://david-dm.org/BlackrockDigital/startbootstrap-scrolling-nav/dev-status.svg)](https://david-dm.org/BlackrockDigital/startbootstrap-scrolling-nav?type=dev)

## Overview

This project was developed by using Xampp as an local Webserver and Database host.

The architecture is structured as following:
* Basic Frontend: index.html
    Technologies used: HTML/CSS; Plain JS; Vue.js; Ajax; jQuery

    WYSIWYG Texteditor: CKEditor Basic

* Data Access Points: selectEntries.php , newEntry.php
    All database access is performed over those two files.

* Backend Access:   login.php, admin.php
    

## Usage

* Database:
    For quick development a MySQL database was used, and data was split up to fit a relational form.
    A NoSQL database would be prefered no handle just JSON data - however Xampp doesn't provide it and I didn't have a clean server to play around.
    
    Therefore selected data from the database was brought into JSON format after recieving it.

    Database Architecture:
        Table   articles    includes    ID[Serial, PK], Username[varchar(64), !NULL], Email[varchar(64) ], Message[text ], Timestamp[timestamp, current_timestamp()], Likes[int ]
                user        includes    ID[Serial, PK], Username[varchar(255) ], Password[varchar(255) ]

    Improvements (Security) to make:
        * Don't store plaintext database credentials
        * Split user and rights even more (Readonly user)

        Database Users:
            - postmanDB: SELECT, INSERT, UPDATE
                pwd: mucSqq1igiTcEID6
            - admin:    
                pwd: EUDqKAf20uqOr4Sc


## Things to improve

* Page View List Objects
    if more than x posts are returned -> multipage view of comments, so it doesn't end in an endless scrolling party
    --> How do you correctly access 

* Non User authentication
    find if user (device/used browser) has already liked a post (simple cookie with IDs of liked posts)
