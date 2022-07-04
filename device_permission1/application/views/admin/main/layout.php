<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
extract($layout);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <style>
        @import 'https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900';
        @import url(<?= base_url('vender/scss/icons/font-awesome/css/font-awesome.min.css') ?>);
        @import url(<?= base_url('vender/scss/icons/simple-line-icons/css/simple-line-icons.css') ?>);
        @import url(<?= base_url('vender/scss/icons/weather-icons/css/weather-icons.min.css') ?>);
        @import url(<?= base_url('vender/scss/icons/linea-icons/linea.css') ?>);
        @import url(<?= base_url('vender/scss/icons/themify-icons/themify-icons.css') ?>);
        @import url(<?= base_url('vender/scss/icons/flag-icon-css/flag-icon.min.css') ?>);
        @import url(<?= base_url('vender/scss/icons/material-design-iconic-font/css/materialdesignicons.min.css') ?>);
        @import url(<?= base_url('vender/css/spinners.css') ?>);
        @import url(<?= base_url('vender/css/animate.css') ?>);


        .preloader {
            width: 100%;
            height: 100%;
            top: 0px;
            position: fixed;
            z-index: 99999;
            background: #fff
        }

        .preloader .cssload-speeding-wheel {
            position: absolute;
            top: calc(50% - 3.5px);
            left: calc(50% - 3.5px)
        }

        * {
            outline: none !important
        }

        body {
            background: #fff;
            font-family: "Rubik", sans-serif;
            margin: 0;
            overflow-x: hidden;
            color: #54667a;
            font-weight: 300
        }

        html {
            position: relative;
            min-height: 100%;
            background: #ffffff
        }

        a:focus, a:hover {
            text-decoration: none
        }

        a.link {
            color: #54667a !important
        }

        a.link:focus, a.link:hover {
            color: #009efb !important
        }

        .img-responsive {
            width: 100%;
            height: auto
        }

        .img-rounded {
            border-radius: 4px
        }

        h1, h2, h3, h4, h5, h6 {
            color: #2c2b2e;
            font-family: "Rubik", sans-serif;
            font-weight: 400
        }

        h1 {
            line-height: 48px;
            font-size: 36px
        }

        h2 {
            line-height: 36px;
            font-size: 24px
        }

        h3 {
            line-height: 30px;
            font-size: 21px
        }

        h4 {
            line-height: 22px;
            font-size: 18px
        }

        h5 {
            line-height: 18px;
            font-size: 16px;
            font-weight: 400
        }

        h6 {
            line-height: 16px;
            font-size: 14px;
            font-weight: 400
        }

        .display-5 {
            font-size: 3rem
        }

        .display-6 {
            font-size: 36px
        }

        .box {
            border-radius: 4px;
            padding: 10px
        }

        .dl {
            display: inline-block !important
        }

        .db {
            display: block !important
        }

        .no-wrap td, .no-wrap th {
            white-space: nowrap
        }

        blockquote {
            border-left: 5px solid #009efb !important;
            border: 1px solid rgba(120, 130, 140, 0.13);
            padding: 15px
        }

        .clear {
            clear: both
        }

        ol li {
            margin: 5px 0
        }

        .p-0 {
            padding: 0px !important
        }

        .p-10 {
            padding: 10px !important
        }

        .p-20 {
            padding: 20px !important
        }

        .p-30 {
            padding: 30px !important
        }

        .p-l-0 {
            padding-left: 0px !important
        }

        .p-l-10 {
            padding-left: 10px !important
        }

        .p-l-20 {
            padding-left: 20px !important
        }

        .p-r-0 {
            padding-right: 0px !important
        }

        .p-r-10 {
            padding-right: 10px !important
        }

        .p-r-20 {
            padding-right: 20px !important
        }

        .p-r-30 {
            padding-right: 30px !important
        }

        .p-r-40 {
            padding-right: 40px !important
        }

        .p-t-0 {
            padding-top: 0px !important
        }

        .p-t-10 {
            padding-top: 10px !important
        }

        .p-t-20 {
            padding-top: 20px !important
        }

        .p-t-30 {
            padding-top: 30px !important
        }

        .p-b-0 {
            padding-bottom: 0px !important
        }

        .p-b-5 {
            padding-bottom: 5px !important
        }

        .p-b-10 {
            padding-bottom: 10px !important
        }

        .p-b-20 {
            padding-bottom: 20px !important
        }

        .p-b-30 {
            padding-bottom: 30px !important
        }

        .p-b-40 {
            padding-bottom: 40px !important
        }

        .m-0 {
            margin: 0px !important
        }

        .m-l-5 {
            margin-left: 5px !important
        }

        .m-l-10 {
            margin-left: 10px !important
        }

        .m-l-15 {
            margin-left: 15px !important
        }

        .m-l-20 {
            margin-left: 20px !important
        }

        .m-l-30 {
            margin-left: 30px !important
        }

        .m-l-40 {
            margin-left: 40px !important
        }

        .m-r-5 {
            margin-right: 5px !important
        }

        .m-r-10 {
            margin-right: 10px !important
        }

        .m-r-15 {
            margin-right: 15px !important
        }

        .m-r-20 {
            margin-right: 20px !important
        }

        .m-r-30 {
            margin-right: 30px !important
        }

        .m-r-40 {
            margin-right: 40px !important
        }

        .m-t-0 {
            margin-top: 0px !important
        }

        .m-t-5 {
            margin-top: 5px !important
        }

        .m-t-10 {
            margin-top: 10px !important
        }

        .m-t-15 {
            margin-top: 15px !important
        }

        .m-t-20 {
            margin-top: 20px !important
        }

        .m-t-30 {
            margin-top: 30px !important
        }

        .m-t-40 {
            margin-top: 40px !important
        }

        .m-b-0 {
            margin-bottom: 0px !important
        }

        .m-b-5 {
            margin-bottom: 5px !important
        }

        .m-b-10 {
            margin-bottom: 10px !important
        }

        .m-b-15 {
            margin-bottom: 15px !important
        }

        .m-b-20 {
            margin-bottom: 20px !important
        }

        .m-b-30 {
            margin-bottom: 30px !important
        }

        .m-b-40 {
            margin-bottom: 40px !important
        }

        .vt {
            vertical-align: top !important
        }

        .vm {
            vertical-align: middle !important
        }

        .vb {
            vertical-align: bottom !important
        }

        .font-bold {
            font-weight: 700 !important
        }

        .font-normal {
            font-weight: normal !important
        }

        .font-light {
            font-weight: 300 !important
        }

        .font-medium {
            font-weight: 400 !important
        }

        .font-16 {
            font-size: 16px !important
        }

        .font-14 {
            font-size: 14px !important
        }

        .font-18 {
            font-size: 18px !important
        }

        .font-20 {
            font-size: 20px !important
        }

        .b-0 {
            border: none
        }

        .b-r {
            border-right: 1px solid rgba(120, 130, 140, 0.13) !important
        }

        .b-l {
            border-left: 1px solid rgba(120, 130, 140, 0.13) !important
        }

        .b-b {
            border-bottom: 1px solid rgba(120, 130, 140, 0.13) !important
        }

        .b-t {
            border-top: 1px solid rgba(120, 130, 140, 0.13) !important
        }

        .b-all {
            border: 1px solid rgba(120, 130, 140, 0.13) !important
        }

        .thumb-sm {
            height: 32px;
            width: 32px
        }

        .thumb-md {
            height: 48px;
            width: 48px
        }

        .thumb-lg {
            height: 88px;
            width: 88px
        }

        .hide {
            display: none
        }

        .img-circle {
            border-radius: 100%
        }

        .radius {
            border-radius: 4px
        }

        .text-muted {
            color: #90a4ae !important
        }

        .bg-primary {
            background-color: #7460ee !important
        }

        .bg-success {
            background-color: #55ce63 !important
        }

        .bg-info {
            background-color: #009efb !important
        }

        .bg-warning {
            background-color: #ffbc34 !important
        }

        .bg-danger {
            background-color: #f62d51 !important
        }

        .bg-megna {
            background-color: #01c0c8 !important
        }

        .bg-theme {
            background-color: #009efb !important
        }

        .bg-inverse {
            background-color: #2f3d4a !important
        }

        .bg-purple {
            background-color: #7460ee !important
        }

        .bg-light-primary {
            background-color: #f1effd !important
        }

        .bg-light-success {
            background-color: #e8fdeb !important
        }

        .bg-light-info {
            background-color: #cfecfe !important
        }

        .bg-light-extra {
            background-color: #ebf3f5 !important
        }

        .bg-light-warning {
            background-color: #fff8ec !important
        }

        .bg-light-danger {
            background-color: #f9e7eb !important
        }

        .bg-light-inverse {
            background-color: #f6f6f6 !important
        }

        .bg-light {
            background-color: #f2f7f8 !important
        }

        .bg-white {
            background-color: #ffffff !important
        }

        .round {
            line-height: 45px;
            color: #ffffff;
            width: 45px;
            height: 45px;
            display: inline-block;
            font-weight: 400;
            text-align: center;
            border-radius: 100%;
            background: #009efb
        }

        .round img {
            border-radius: 100%
        }

        .round.round-info {
            background: #009efb
        }

        .round.round-warning {
            background: #ffbc34
        }

        .round.round-danger {
            background: #f62d51
        }

        .round.round-success {
            background: #55ce63
        }

        .round.round-primary {
            background: #7460ee
        }

        .label {
            padding: 2px 10px;
            line-height: 13px;
            color: #ffffff;
            font-weight: 400;
            border-radius: 4px;
            font-size: 75%
        }

        .label-rounded {
            border-radius: 60px
        }

        .label-custom {
            background-color: #01c0c8
        }

        .label-success {
            background-color: #55ce63
        }

        .label-info {
            background-color: #009efb
        }

        .label-warning {
            background-color: #ffbc34
        }

        .label-danger {
            background-color: #f62d51
        }

        .label-megna {
            background-color: #01c0c8
        }

        .label-primary {
            background-color: #7460ee
        }

        .label-purple {
            background-color: #7460ee
        }

        .label-red {
            background-color: #fb3a3a
        }

        .label-inverse {
            background-color: #2f3d4a
        }

        .label-default {
            background-color: #f2f7f8
        }

        .label-white {
            background-color: #ffffff
        }

        .label-light-success {
            background-color: #e8fdeb;
            color: #55ce63
        }

        .label-light-info {
            background-color: #cfecfe;
            color: #009efb
        }

        .label-light-warning {
            background-color: #fff8ec;
            color: #ffbc34
        }

        .label-light-danger {
            background-color: #f9e7eb;
            color: #f62d51
        }

        .label-light-megna {
            background-color: #e0f2f4;
            color: #01c0c8
        }

        .label-light-primary {
            background-color: #f1effd;
            color: #7460ee
        }

        .label-light-inverse {
            background-color: #f6f6f6;
            color: #2f3d4a
        }

        .pagination > li:first-child > a, .pagination > li:first-child > span {
            border-bottom-left-radius: 4px;
            border-top-left-radius: 4px
        }

        .pagination > li:last-child > a, .pagination > li:last-child > span {
            border-bottom-right-radius: 4px;
            border-top-right-radius: 4px
        }

        .pagination > li > a, .pagination > li > span {
            color: #263238
        }

        .pagination > li > a:focus, .pagination > li > a:hover, .pagination > li > span:focus, .pagination > li > span:hover {
            background-color: #f2f7f8
        }

        .pagination-split li {
            margin-left: 5px;
            display: inline-block;
            float: left
        }

        .pagination-split li:first-child {
            margin-left: 0
        }

        .pagination-split li a {
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
            border-radius: 4px
        }

        .pagination > .active > a, .pagination > .active > a:focus, .pagination > .active > a:hover, .pagination > .active > span, .pagination > .active > span:focus, .pagination > .active > span:hover {
            background-color: #009efb;
            border-color: #009efb
        }

        .pager li > a, .pager li > span {
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
            border-radius: 4px;
            color: #263238
        }

        .table-box {
            display: table;
            width: 100%
        }

        .table.no-border tbody td {
            border: 0px
        }

        .cell {
            display: table-cell;
            vertical-align: middle
        }

        .table td, .table th {
            border-color: #f3f1f1
        }

        .table th, .table thead th {
            font-weight: 500
        }

        .table-hover tbody tr:hover {
            background: #f2f7f8
        }

        .jqstooltip {
            width: auto !important;
            height: auto !important
        }

        .v-middle td, .v-middle th {
            vertical-align: middle
        }

        .waves-effect {
            position: relative;
            cursor: pointer;
            display: inline-block;
            overflow: hidden;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            -webkit-tap-highlight-color: transparent;
            vertical-align: middle;
            z-index: 1;
            will-change: opacity, transform;
            -webkit-transition: all 0.3s ease-out;
            -moz-transition: all 0.3s ease-out;
            -o-transition: all 0.3s ease-out;
            -ms-transition: all 0.3s ease-out;
            transition: all 0.3s ease-out
        }

        .waves-effect .waves-ripple {
            position: absolute;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            margin-top: -10px;
            margin-left: -10px;
            opacity: 0;
            background: rgba(0, 0, 0, 0.2);
            -webkit-transition: all 0.7s ease-out;
            -moz-transition: all 0.7s ease-out;
            -o-transition: all 0.7s ease-out;
            -ms-transition: all 0.7s ease-out;
            transition: all 0.7s ease-out;
            -webkit-transition-property: -webkit-transform, opacity;
            -moz-transition-property: -moz-transform, opacity;
            -o-transition-property: -o-transform, opacity;
            transition-property: opacity, -webkit-transform;
            transition-property: transform, opacity;
            transition-property: transform, opacity, -webkit-transform;
            -webkit-transform: scale(0);
            -moz-transform: scale(0);
            -ms-transform: scale(0);
            -o-transform: scale(0);
            transform: scale(0);
            pointer-events: none
        }

        .waves-effect.waves-light .waves-ripple {
            background-color: rgba(255, 255, 255, 0.45)
        }

        .waves-effect.waves-red .waves-ripple {
            background-color: rgba(244, 67, 54, 0.7)
        }

        .waves-effect.waves-yellow .waves-ripple {
            background-color: rgba(255, 235, 59, 0.7)
        }

        .waves-effect.waves-orange .waves-ripple {
            background-color: rgba(255, 152, 0, 0.7)
        }

        .waves-effect.waves-purple .waves-ripple {
            background-color: rgba(156, 39, 176, 0.7)
        }

        .waves-effect.waves-green .waves-ripple {
            background-color: rgba(76, 175, 80, 0.7)
        }

        .waves-effect.waves-teal .waves-ripple {
            background-color: rgba(0, 150, 136, 0.7)
        }

        .waves-notransition {
            -webkit-transition: none !important;
            -moz-transition: none !important;
            -o-transition: none !important;
            -ms-transition: none !important;
            transition: none !important
        }

        .waves-circle {
            -webkit-transform: translateZ(0);
            -moz-transform: translateZ(0);
            -ms-transform: translateZ(0);
            -o-transform: translateZ(0);
            transform: translateZ(0);
            text-align: center;
            width: 2.5em;
            height: 2.5em;
            line-height: 2.5em;
            border-radius: 50%;
            -webkit-mask-image: none
        }

        .waves-input-wrapper {
            border-radius: 0.2em;
            vertical-align: bottom
        }

        .waves-input-wrapper .waves-button-input {
            position: relative;
            top: 0;
            left: 0;
            z-index: 1
        }

        .waves-block {
            display: block
        }

        .badge {
            font-weight: 400
        }

        .badge-xs {
            font-size: 9px
        }

        .badge-sm, .badge-xs {
            -webkit-transform: translate(0, -2px);
            -ms-transform: translate(0, -2px);
            -o-transform: translate(0, -2px);
            transform: translate(0, -2px)
        }

        .badge-success {
            background-color: #55ce63
        }

        .badge-info {
            background-color: #009efb
        }

        .badge-primary {
            background-color: #7460ee
        }

        .badge-warning {
            background-color: #ffbc34
        }

        .badge-danger {
            background-color: #f62d51
        }

        .badge-purple {
            background-color: #7460ee
        }

        .badge-red {
            background-color: #fb3a3a
        }

        .badge-inverse {
            background-color: #2f3d4a
        }

        .text-white {
            color: #ffffff !important
        }

        .text-danger {
            color: #f62d51 !important
        }

        .text-muted {
            color: #90a4ae !important
        }

        .text-warning {
            color: #ffbc34 !important
        }

        .text-success {
            color: #55ce63 !important
        }

        .text-info {
            color: #009efb !important
        }

        .text-inverse {
            color: #2f3d4a !important
        }

        .text-blue {
            color: #02bec9 !important
        }

        .text-purple {
            color: #7460ee !important
        }

        .text-primary {
            color: #7460ee !important
        }

        .text-megna {
            color: #01c0c8 !important
        }

        .text-dark {
            color: #54667a !important
        }

        .text-themecolor {
            color: #009efb !important
        }

        .btn {
            padding: 7px 12px;
            font-size: 14px;
            cursor: pointer
        }

        .btn-group label {
            color: #ffffff !important;
            margin-bottom: 0px
        }

        .btn-group label.btn-secondary {
            color: #54667a !important
        }

        .btn-lg {
            padding: .75rem 1.5rem;
            font-size: 1.25rem
        }

        .btn-circle {
            border-radius: 100%;
            width: 40px;
            height: 40px;
            padding: 10px
        }

        .btn-circle.btn-sm {
            width: 35px;
            height: 35px;
            padding: 8px 10px;
            font-size: 14px
        }

        .btn-circle.btn-lg {
            width: 50px;
            height: 50px;
            padding: 14px 15px;
            font-size: 18px
        }

        .btn-circle.btn-xl {
            width: 70px;
            height: 70px;
            padding: 14px 15px;
            font-size: 24px
        }

        .btn-sm {
            padding: .25rem .5rem;
            font-size: 12px
        }

        .btn-xs {
            padding: .25rem .5rem;
            font-size: 10px
        }

        .button-list a, .button-list button {
            margin: 5px 12px 5px 0
        }

        .btn-outline {
            color: inherit;
            background-color: transparent;
            transition: all .5s
        }

        .btn-rounded {
            border-radius: 60px;
            padding: 7px 18px
        }

        .btn-rounded.btn-lg {
            padding: .75rem 1.5rem
        }

        .btn-rounded.btn-sm {
            padding: .25rem .5rem;
            font-size: 12px
        }

        .btn-rounded.btn-xs {
            padding: .25rem .5rem;
            font-size: 10px
        }

        .btn-custom, .btn-custom.disabled {
            background: #009efb;
            border: 1px solid #009efb;
            color: #ffffff
        }

        .btn-custom.disabled:hover, .btn-custom:hover {
            background: #009efb;
            opacity: 0.8;
            color: #ffffff;
            border: 1px solid #009efb
        }

        .btn-primary, .btn-primary.disabled {
            background: #7460ee;
            border: 1px solid #7460ee
        }

        .btn-primary.disabled:hover, .btn-primary:hover {
            background: #7460ee;
            opacity: 0.7;
            border: 1px solid #7460ee
        }

        .btn-primary.active, .btn-primary.disabled.active, .btn-primary.disabled:focus, .btn-primary:focus {
            background: #6352ce
        }

        .btn-themecolor, .btn-themecolor.disabled {
            background: #009efb;
            color: #ffffff;
            border: 1px solid #009efb
        }

        .btn-themecolor.disabled:hover, .btn-themecolor:hover {
            background: #009efb;
            opacity: 0.7;
            border: 1px solid #009efb
        }

        .btn-themecolor.active, .btn-themecolor.disabled.active, .btn-themecolor.disabled:focus, .btn-themecolor:focus {
            background: #028ee1
        }

        .btn-success, .btn-success.disabled {
            background: #55ce63;
            border: 1px solid #55ce63
        }

        .btn-success.disabled:hover, .btn-success:hover {
            background: #55ce63;
            opacity: 0.7;
            border: 1px solid #55ce63
        }

        .btn-success.active, .btn-success.disabled.active, .btn-success.disabled:focus, .btn-success:focus {
            background: #4ab657
        }

        .btn-info, .btn-info.disabled {
            background: #009efb;
            border: 1px solid #009efb
        }

        .btn-info.disabled:hover, .btn-info:hover {
            background: #009efb;
            opacity: 0.7;
            border: 1px solid #009efb
        }

        .btn-info.active, .btn-info.disabled.active, .btn-info.disabled:focus, .btn-info:focus {
            background: #028ee1
        }

        .btn-warning, .btn-warning.disabled {
            background: #ffbc34;
            border: 1px solid #ffbc34
        }

        .btn-warning.disabled:hover, .btn-warning:hover {
            background: #ffbc34;
            opacity: 0.7;
            border: 1px solid #ffbc34
        }

        .btn-warning.active, .btn-warning.disabled.active, .btn-warning.disabled:focus, .btn-warning:focus {
            background: #e9ab2e
        }

        .btn-danger, .btn-danger.disabled {
            background: #f62d51;
            border: 1px solid #f62d51
        }

        .btn-danger.disabled:hover, .btn-danger:hover {
            background: #f62d51;
            opacity: 0.7;
            border: 1px solid #f62d51
        }

        .btn-danger.active, .btn-danger.disabled.active, .btn-danger.disabled:focus, .btn-danger:focus {
            background: #e6294b
        }

        .btn-inverse, .btn-inverse.disabled {
            background: #2f3d4a;
            border: 1px solid #2f3d4a;
            color: #ffffff
        }

        .btn-inverse.disabled:hover, .btn-inverse:hover {
            background: #2f3d4a;
            opacity: 0.7;
            color: #ffffff;
            border: 1px solid #2f3d4a
        }

        .btn-inverse.active, .btn-inverse.disabled.active, .btn-inverse.disabled:focus, .btn-inverse:focus {
            background: #232a37;
            color: #ffffff
        }

        .btn-red, .btn-red.disabled {
            background: #fb3a3a;
            border: 1px solid #fb3a3a;
            color: #ffffff
        }

        .btn-red.disabled:hover, .btn-red:hover {
            opacity: 0.7;
            border: 1px solid #fb3a3a;
            background: #fb3a3a
        }

        .btn-red.active, .btn-red.disabled.active, .btn-red.disabled:focus, .btn-red:focus {
            background: #e6294b
        }

        .btn-outline-default {
            background-color: #ffffff
        }

        .btn-outline-default.focus, .btn-outline-default:focus, .btn-outline-default:hover {
            background: #f2f7f8
        }

        .btn-outline-primary {
            color: #7460ee;
            background-color: #ffffff;
            border-color: #7460ee
        }

        .btn-outline-primary.focus, .btn-outline-primary:focus, .btn-outline-primary:hover {
            background: #7460ee;
            color: #ffffff;
            border-color: #7460ee
        }

        .btn-outline-success {
            color: #55ce63;
            background-color: transparent;
            border-color: #55ce63
        }

        .btn-outline-success.focus, .btn-outline-success:focus, .btn-outline-success:hover {
            background: #55ce63;
            border-color: #55ce63;
            color: #ffffff
        }

        .btn-outline-info {
            color: #009efb;
            background-color: transparent;
            border-color: #009efb
        }

        .btn-outline-info.focus, .btn-outline-info:focus, .btn-outline-info:hover {
            background: #009efb;
            border-color: #009efb;
            color: #ffffff
        }

        .btn-outline-warning {
            color: #ffbc34;
            background-color: transparent;
            border-color: #ffbc34
        }

        .btn-outline-warning.focus, .btn-outline-warning:focus, .btn-outline-warning:hover {
            background: #ffbc34;
            border-color: #ffbc34;
            color: #ffffff
        }

        .btn-outline-danger {
            color: #f62d51;
            background-color: transparent;
            border-color: #f62d51
        }

        .btn-outline-danger.focus, .btn-outline-danger:focus, .btn-outline-danger:hover {
            background: #f62d51;
            border-color: #f62d51;
            color: #ffffff
        }

        .btn-outline-red {
            color: #fb3a3a;
            background-color: transparent;
            border-color: #fb3a3a
        }

        .btn-outline-red.focus, .btn-outline-red:focus, .btn-outline-red:hover {
            background: #fb3a3a;
            border-color: #fb3a3a;
            color: #ffffff
        }

        .btn-outline-inverse {
            color: #2f3d4a;
            background-color: transparent;
            border-color: #2f3d4a
        }

        .btn-outline-inverse.focus, .btn-outline-inverse:focus, .btn-outline-inverse:hover {
            background: #2f3d4a;
            border-color: #2f3d4a;
            color: #ffffff
        }

        .btn-primary.active.focus, .btn-primary.active:focus, .btn-primary.active:hover, .btn-primary.focus, .btn-primary.focus:active, .btn-primary:active:focus, .btn-primary:active:hover, .btn-primary:focus, .open > .dropdown-toggle.btn-primary.focus, .open > .dropdown-toggle.btn-primary:focus, .open > .dropdown-toggle.btn-primary:hover {
            background-color: #6352ce;
            border: 1px solid #6352ce
        }

        .btn-success.active.focus, .btn-success.active:focus, .btn-success.active:hover, .btn-success.focus, .btn-success.focus:active, .btn-success:active:focus, .btn-success:active:hover, .btn-success:focus, .open > .dropdown-toggle.btn-success.focus, .open > .dropdown-toggle.btn-success:focus, .open > .dropdown-toggle.btn-success:hover {
            background-color: #4ab657;
            border: 1px solid #4ab657
        }

        .btn-info.active.focus, .btn-info.active:focus, .btn-info.active:hover, .btn-info.focus, .btn-info.focus:active, .btn-info:active:focus, .btn-info:active:hover, .btn-info:focus, .open > .dropdown-toggle.btn-info.focus, .open > .dropdown-toggle.btn-info:focus, .open > .dropdown-toggle.btn-info:hover {
            background-color: #028ee1;
            border: 1px solid #028ee1
        }

        .btn-warning.active.focus, .btn-warning.active:focus, .btn-warning.active:hover, .btn-warning.focus, .btn-warning.focus:active, .btn-warning:active:focus, .btn-warning:active:hover, .btn-warning:focus, .open > .dropdown-toggle.btn-warning.focus, .open > .dropdown-toggle.btn-warning:focus, .open > .dropdown-toggle.btn-warning:hover {
            background-color: #e9ab2e;
            border: 1px solid #e9ab2e
        }

        .btn-danger.active.focus, .btn-danger.active:focus, .btn-danger.active:hover, .btn-danger.focus, .btn-danger.focus:active, .btn-danger:active:focus, .btn-danger:active:hover, .btn-danger:focus, .open > .dropdown-toggle.btn-danger.focus, .open > .dropdown-toggle.btn-danger:focus, .open > .dropdown-toggle.btn-danger:hover {
            background-color: #e6294b;
            border: 1px solid #e6294b
        }

        .btn-inverse.active, .btn-inverse.focus, .btn-inverse:active, .btn-inverse:focus, .btn-inverse:hover, .btn-inverse:hover, .open > .dropdown-toggle.btn-inverse {
            background-color: #232a37;
            border: 1px solid #232a37
        }

        .btn-red.active, .btn-red.focus, .btn-red:active, .btn-red:focus, .btn-red:hover, .btn-red:hover, .open > .dropdown-toggle.btn-red {
            background-color: #d61f1f;
            border: 1px solid #d61f1f;
            color: #ffffff
        }

        .button-box .btn {
            margin: 0 8px 8px 0px
        }

        .btn-label {
            background: rgba(0, 0, 0, 0.05);
            display: inline-block;
            margin: -6px 12px -6px -14px;
            padding: 7px 15px
        }

        .btn-facebook {
            color: #ffffff !important;
            background-color: #3b5998 !important
        }

        .btn-twitter {
            color: #ffffff !important;
            background-color: #55acee !important
        }

        .btn-linkedin {
            color: #ffffff !important;
            background-color: #007bb6 !important
        }

        .btn-dribbble {
            color: #ffffff !important;
            background-color: #ea4c89 !important
        }

        .btn-googleplus {
            color: #ffffff !important;
            background-color: #dd4b39 !important
        }

        .btn-instagram {
            color: #ffffff !important;
            background-color: #3f729b !important
        }

        .btn-pinterest {
            color: #ffffff !important;
            background-color: #cb2027 !important
        }

        .btn-dropbox {
            color: #ffffff !important;
            background-color: #007ee5 !important
        }

        .btn-flickr {
            color: #ffffff !important;
            background-color: #ff0084 !important
        }

        .btn-tumblr {
            color: #ffffff !important;
            background-color: #32506d !important
        }

        .btn-skype {
            color: #ffffff !important;
            background-color: #00aff0 !important
        }

        .btn-youtube {
            color: #ffffff !important;
            background-color: #bb0000 !important
        }

        .btn-github {
            color: #ffffff !important;
            background-color: #171515 !important
        }

        .notify {
            position: relative;
            top: -25px;
            right: -7px
        }

        .notify .heartbit {
            position: absolute;
            top: -20px;
            right: -4px;
            height: 25px;
            width: 25px;
            z-index: 10;
            border: 5px solid #f62d51;
            border-radius: 70px;
            -moz-animation: heartbit 1s ease-out;
            -moz-animation-iteration-count: infinite;
            -o-animation: heartbit 1s ease-out;
            -o-animation-iteration-count: infinite;
            -webkit-animation: heartbit 1s ease-out;
            -webkit-animation-iteration-count: infinite;
            animation-iteration-count: infinite
        }

        .notify .point {
            width: 6px;
            height: 6px;
            -webkit-border-radius: 30px;
            -moz-border-radius: 30px;
            border-radius: 30px;
            background-color: #f62d51;
            position: absolute;
            right: 6px;
            top: -10px
        }

        @-moz-keyframes heartbit {
            0% {
                -moz-transform: scale(0);
                opacity: 0.0
            }
            25% {
                -moz-transform: scale(0.1);
                opacity: 0.1
            }
            50% {
                -moz-transform: scale(0.5);
                opacity: 0.3
            }
            75% {
                -moz-transform: scale(0.8);
                opacity: 0.5
            }
            to {
                -moz-transform: scale(1);
                opacity: 0.0
            }
        }

        @-webkit-keyframes heartbit {
            0% {
                -webkit-transform: scale(0);
                opacity: 0.0
            }
            25% {
                -webkit-transform: scale(0.1);
                opacity: 0.1
            }
            50% {
                -webkit-transform: scale(0.5);
                opacity: 0.3
            }
            75% {
                -webkit-transform: scale(0.8);
                opacity: 0.5
            }
            to {
                -webkit-transform: scale(1);
                opacity: 0.0
            }
        }

        .checkbox {
            padding-left: 20px
        }

        .checkbox label {
            display: block;
            padding-left: 5px;
            position: relative
        }

        .checkbox label:before {
            -o-transition: 0.3s ease-in-out;
            -webkit-transition: 0.3s ease-in-out;
            background-color: #ffffff;
            border-radius: 1px;
            border: 1px solid rgba(120, 130, 140, 0.13);
            content: "";
            display: inline-block;
            height: 17px;
            left: 0;
            top: 3px;
            margin-left: -20px;
            position: absolute;
            transition: 0.3s ease-in-out;
            width: 17px;
            outline: none !important
        }

        .checkbox label:after {
            color: #263238;
            display: inline-block;
            font-size: 11px;
            height: 16px;
            left: 0;
            margin-left: -20px;
            padding-left: 3px;
            padding-top: 1px;
            position: absolute;
            top: 3px;
            width: 16px
        }

        .checkbox input[type=checkbox] {
            cursor: pointer;
            opacity: 0;
            z-index: 1;
            position: absolute;
            left: 0px;
            outline: none !important
        }

        .checkbox input[type=checkbox]:disabled + label {
            opacity: 0.65
        }

        .checkbox input[type=checkbox]:focus + label:before {
            outline-offset: -2px;
            outline: none;
            outline: thin dotted
        }

        .checkbox input[type=checkbox]:checked + label:after {
            content: "\f00c";
            font-family: 'FontAwesome'
        }

        .checkbox input[type=checkbox]:disabled + label:before {
            background-color: #f2f7f8;
            cursor: not-allowed
        }

        .checkbox.checkbox-circle label:before {
            border-radius: 50%
        }

        .checkbox.checkbox-inline {
            margin-top: 0
        }

        .checkbox.checkbox-single label {
            height: 17px
        }

        .checkbox-primary input[type=checkbox]:checked + label:before {
            background-color: #7460ee;
            border-color: #7460ee
        }

        .checkbox-primary input[type=checkbox]:checked + label:after {
            color: #ffffff
        }

        .checkbox-danger input[type=checkbox]:checked + label:before {
            background-color: #f62d51;
            border-color: #f62d51
        }

        .checkbox-danger input[type=checkbox]:checked + label:after {
            color: #ffffff
        }

        .checkbox-info input[type=checkbox]:checked + label:before {
            background-color: #009efb;
            border-color: #009efb
        }

        .checkbox-info input[type=checkbox]:checked + label:after {
            color: #ffffff
        }

        .checkbox-warning input[type=checkbox]:checked + label:before {
            background-color: #ffbc34;
            border-color: #ffbc34
        }

        .checkbox-warning input[type=checkbox]:checked + label:after {
            color: #ffffff
        }

        .checkbox-success input[type=checkbox]:checked + label:before {
            background-color: #55ce63;
            border-color: #55ce63
        }

        .checkbox-success input[type=checkbox]:checked + label:after {
            color: #ffffff
        }

        .checkbox-purple input[type=checkbox]:checked + label:before {
            background-color: #7460ee;
            border-color: #7460ee
        }

        .checkbox-purple input[type=checkbox]:checked + label:after {
            color: #ffffff
        }

        .checkbox-red input[type=checkbox]:checked + label:before {
            background-color: #f62d51;
            border-color: #f62d51
        }

        .checkbox-red input[type=checkbox]:checked + label:after {
            color: #ffffff
        }

        .checkbox-inverse input[type=checkbox]:checked + label:before {
            background-color: #2f3d4a;
            border-color: #2f3d4a
        }

        .checkbox-inverse input[type=checkbox]:checked + label:after {
            color: #ffffff
        }

        .radio {
            padding-left: 20px
        }

        .radio label {
            display: inline-block;
            padding-left: 5px;
            position: relative
        }

        .radio label:before {
            -o-transition: border 0.5s ease-in-out;
            -webkit-transition: border 0.5s ease-in-out;
            background-color: #ffffff;
            border-radius: 50%;
            border: 1px solid rgba(120, 130, 140, 0.13);
            content: "";
            display: inline-block;
            height: 17px;
            left: 0;
            margin-left: -20px;
            outline: none !important;
            position: absolute;
            transition: border 0.5s ease-in-out;
            width: 17px;
            outline: none !important
        }

        .radio label:after {
            -moz-transition: -moz-transform 0.3s cubic-bezier(0.8, -0.33, 0.2, 1.33);
            -ms-transform: scale(0, 0);
            -o-transform: scale(0, 0);
            -o-transition: -o-transform 0.3s cubic-bezier(0.8, -0.33, 0.2, 1.33);
            -webkit-transform: scale(0, 0);
            -webkit-transition: -webkit-transform 0.3s cubic-bezier(0.8, -0.33, 0.2, 1.33);
            background-color: #263238;
            border-radius: 50%;
            content: " ";
            display: inline-block;
            height: 7px;
            left: 5px;
            margin-left: -20px;
            position: absolute;
            top: 5px;
            transform: scale(0, 0);
            transition: -webkit-transform 0.3s cubic-bezier(0.8, -0.33, 0.2, 1.33);
            transition: transform 0.3s cubic-bezier(0.8, -0.33, 0.2, 1.33);
            transition: transform 0.3s cubic-bezier(0.8, -0.33, 0.2, 1.33), -webkit-transform 0.3s cubic-bezier(0.8, -0.33, 0.2, 1.33);
            width: 7px
        }

        .radio input[type=radio] {
            cursor: pointer;
            opacity: 0;
            z-index: 1;
            outline: none !important
        }

        .radio input[type=radio]:disabled + label {
            opacity: 0.65
        }

        .radio input[type=radio]:focus + label:before {
            outline-offset: -2px;
            outline: 5px auto -webkit-focus-ring-color;
            outline: thin dotted
        }

        .radio input[type=radio]:checked + label:after {
            -ms-transform: scale(1, 1);
            -o-transform: scale(1, 1);
            -webkit-transform: scale(1, 1);
            transform: scale(1, 1)
        }

        .radio input[type=radio]:disabled + label:before {
            cursor: not-allowed
        }

        .radio.radio-inline {
            margin-top: 0
        }

        .radio.radio-single label {
            height: 17px
        }

        .radio-primary input[type=radio] + label:after {
            background-color: #7460ee
        }

        .radio-primary input[type=radio]:checked + label:before {
            border-color: #7460ee
        }

        .radio-primary input[type=radio]:checked + label:after {
            background-color: #7460ee
        }

        .radio-danger input[type=radio] + label:after {
            background-color: #f62d51
        }

        .radio-danger input[type=radio]:checked + label:before {
            border-color: #f62d51
        }

        .radio-danger input[type=radio]:checked + label:after {
            background-color: #f62d51
        }

        .radio-info input[type=radio] + label:after {
            background-color: #009efb
        }

        .radio-info input[type=radio]:checked + label:before {
            border-color: #009efb
        }

        .radio-info input[type=radio]:checked + label:after {
            background-color: #009efb
        }

        .radio-warning input[type=radio] + label:after {
            background-color: #ffbc34
        }

        .radio-warning input[type=radio]:checked + label:before {
            border-color: #ffbc34
        }

        .radio-warning input[type=radio]:checked + label:after {
            background-color: #ffbc34
        }

        .radio-success input[type=radio] + label:after {
            background-color: #55ce63
        }

        .radio-success input[type=radio]:checked + label:before {
            border-color: #55ce63
        }

        .radio-success input[type=radio]:checked + label:after {
            background-color: #55ce63
        }

        .radio-purple input[type=radio] + label:after {
            background-color: #7460ee
        }

        .radio-purple input[type=radio]:checked + label:before {
            border-color: #7460ee
        }

        .radio-purple input[type=radio]:checked + label:after {
            background-color: #7460ee
        }

        .radio-red input[type=radio] + label:after {
            background-color: #f62d51
        }

        .radio-red input[type=radio]:checked + label:before {
            border-color: #f62d51
        }

        .radio-red input[type=radio]:checked + label:after {
            background-color: #f62d51
        }

        .checkbox label, .radio label {
            cursor: pointer
        }

        .fileupload {
            overflow: hidden;
            position: relative
        }

        .fileupload input.upload {
            cursor: pointer;
            filter: alpha(opacity=0);
            font-size: 20px;
            margin: 0;
            opacity: 0;
            padding: 0;
            position: absolute;
            right: 0;
            top: 0
        }

        .mega-dropdown {
            position: static;
            width: 100%
        }

        .mega-dropdown .dropdown-menu {
            width: 100%;
            padding: 30px;
            margin-top: 0px;
            background: url(<?= base_url('vender/assets/images/background/megamenubg.jpg') ?>) no-repeat right bottom #fff
        }

        .mega-dropdown ul {
            padding: 0px
        }

        .mega-dropdown ul li {
            list-style: none
        }

        .mega-dropdown .carousel-item .container {
            padding: 0px
        }

        .mega-dropdown .nav-accordion .card {
            margin-bottom: 1px
        }

        .mega-dropdown .nav-accordion .card-header {
            background: #ffffff
        }

        .mega-dropdown .nav-accordion .card-header h5 {
            margin: 0px
        }

        .mega-dropdown .nav-accordion .card-header h5 a {
            text-decoration: none;
            color: #54667a
        }

        ul.list-style-none {
            margin: 0px;
            padding: 0px
        }

        ul.list-style-none li {
            list-style: none
        }

        ul.list-style-none li a {
            color: #54667a;
            padding: 8px 0px;
            display: block;
            text-decoration: none
        }

        ul.list-style-none li a:hover {
            color: #009efb
        }

        .dropdown-item {
            padding: 8px 1rem;
            color: #54667a
        }

        .custom-select {
            background: url(<?= base_url("vender/assets/images/custom-select.png"); ?>) right 0.75rem center no-repeat
        }

        textarea {
            resize: none
        }

        .form-control {
            color: #54667a;
            min-height: 38px;
            display: initial
        }

        .form-control-sm {
            min-height: 20px
        }

        .form-control:disabled, .form-control[readonly] {
            opacity: 0.7
        }

        .custom-control-input:focus ~ .custom-control-indicator {
            box-shadow: none
        }

        .custom-control-input:checked ~ .custom-control-indicator {
            background-color: #55ce63
        }

        form label {
            font-weight: 400
        }

        .form-group {
            margin-bottom: 25px
        }

        .form-horizontal label {
            margin-bottom: 0px
        }

        .form-control-static {
            padding-top: 0px
        }

        .form-bordered .form-group {
            border-bottom: 1px solid rgba(120, 130, 140, 0.13);
            padding-bottom: 20px
        }

        .card-no-border .card {
            border: 0px
        }

        .card-no-border .sidebar-footer {
            background: #ffffff
        }

        .card-no-border .page-wrapper {
            background: #f2f7f8
        }

        .card-no-border .left-sidebar {
            box-shadow: 1px 0px 20px rgba(0, 0, 0, 0.08)
        }

        .card-no-border .left-sidebar, .card-no-border .sidebar-nav {
            background: #ffffff
        }

        .card-no-border .sidebar-nav > ul > li > a.active {
            background: #f2f7f8
        }

        .card-no-border .shadow-none {
            box-shadow: none
        }

        .card-outline-danger, .card-outline-info, .card-outline-primary, .card-outline-success, .card-outline-warning {
            background: #ffffff
        }

        .card-no-border .card-group .card {
            border: 1px solid rgba(120, 130, 140, 0.13)
        }

        .card-header {
            background-color: #dae6e8
        }

        .css-bar:after {
            z-index: 1
        }

        .css-bar > i {
            z-index: 10
        }

        .single-column .left-sidebar {
            display: none
        }

        .single-column .page-wrapper {
            margin-left: 0px
        }

        .fix-width {
            width: 100%;
            max-width: 1170px;
            margin: 0 auto
        }

        ul.common li {
            display: inline-block;
            line-height: 40px;
            list-style: outside none none;
            width: 48%
        }

        #main-wrapper {
            width: 100%
        }

        .boxed #main-wrapper {
            width: 100%;
            max-width: 1300px;
            margin: 0 auto;
            box-shadow: 0 0 60px rgba(0, 0, 0, 0.1)
        }

        .boxed #main-wrapper .sidebar-footer {
            position: absolute
        }

        .boxed #main-wrapper .footer {
            display: none
        }

        .page-wrapper {
            background: #fff;
            padding-bottom: 60px
        }

        .container-fluid {
            padding: 25px 30px
        }

        .topbar {
            position: relative;
            z-index: 50
        }

        .topbar .top-navbar {
            min-height: 70px;
            padding: 0px 15px 0 0
        }

        .topbar .top-navbar .dropdown-toggle:after {
            display: none
        }

        .topbar .top-navbar .navbar-header {
            line-height: 65px;
            text-align: center
        }

        .topbar .top-navbar .navbar-header .navbar-brand {
            margin-right: 0px;
            padding-bottom: 0px;
            padding-top: 0px
        }

        .topbar .top-navbar .navbar-header .navbar-brand .light-logo {
            display: none
        }

        .topbar .top-navbar .navbar-header .navbar-brand b {
            line-height: 70px;
            display: inline-block
        }

        .topbar .top-navbar .navbar-nav > .nav-item > .nav-link {
            padding-left: .75rem;
            padding-right: .75rem;
            font-size: 17px;
            line-height: 50px
        }

        .topbar .top-navbar .navbar-nav > .nav-item.show {
            background: rgba(0, 0, 0, 0.05)
        }

        .topbar .top-navbar .app-search {
            position: relative;
            margin-top: 13px;
            margin-right: 10px;
            display: inline-block
        }

        .topbar .top-navbar .app-search input {
            width: 200px;
            border-radius: 100px;
            font-size: 14px;
            transition: 0.5s ease-in
        }

        .topbar .top-navbar .app-search input:focus {
            width: 240px
        }

        .topbar .top-navbar .app-search .srh-btn {
            position: absolute;
            top: 8px;
            cursor: pointer;
            background: #ffffff;
            width: 15px;
            height: 15px;
            right: 10px;
            font-size: 14px
        }

        .topbar .profile-pic {
            width: 30px;
            border-radius: 100%
        }

        .topbar .dropdown-menu {
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.05);
            -webkit-box-shadow: 0 3px 12px rgba(0, 0, 0, 0.05);
            -moz-box-shadow: 0 3px 12px rgba(0, 0, 0, 0.05);
            border-color: rgba(120, 130, 140, 0.13)
        }

        .topbar .dropdown-menu .dropdown-item {
            padding: 7px 1.5rem
        }

        .topbar ul.dropdown-user {
            padding: 0px;
            width: 270px
        }

        .topbar ul.dropdown-user li {
            list-style: none;
            padding: 0px;
            margin: 0px
        }

        .topbar ul.dropdown-user li.divider {
            height: 1px;
            margin: 9px 0;
            overflow: hidden;
            background-color: rgba(120, 130, 140, 0.13)
        }

        .topbar ul.dropdown-user li .dw-user-box {
            padding: 10px 15px
        }

        .topbar ul.dropdown-user li .dw-user-box .u-img {
            width: 80px;
            display: inline-block;
            vertical-align: top
        }

        .topbar ul.dropdown-user li .dw-user-box .u-img img {
            width: 100%;
            border-radius: 5px
        }

        .topbar ul.dropdown-user li .dw-user-box .u-text {
            display: inline-block;
            padding-left: 10px
        }

        .topbar ul.dropdown-user li .dw-user-box .u-text h4 {
            margin: 0px
        }

        .topbar ul.dropdown-user li .dw-user-box .u-text p {
            margin-bottom: 2px;
            font-size: 14px
        }

        .topbar ul.dropdown-user li .dw-user-box .u-text .btn {
            color: #ffffff;
            padding: 5px 10px;
            display: inline-block
        }

        .topbar ul.dropdown-user li .dw-user-box .u-text .btn:hover {
            background: #e6294b
        }

        .topbar ul.dropdown-user li a {
            padding: 9px 15px;
            display: block;
            color: #54667a
        }

        .topbar ul.dropdown-user li a:hover {
            background: #f2f7f8;
            color: #009efb;
            text-decoration: none
        }

        .mini-sidebar .top-navbar .navbar-header {
            width: 60px;
            text-align: center
        }

        .logo-center .top-navbar .navbar-header {
            position: absolute;
            left: 0;
            right: 0;
            margin: 0 auto
        }

        .page-titles .breadcrumb {
            padding: 0px;
            background: transparent
        }

        .page-titles .breadcrumb .breadcrumb-item + .breadcrumb-item:before {
            content: "\e649";
            font-family: themify;
            color: #a6b7bf;
            font-size: 14px
        }

        @-webkit-keyframes rotate {
            0% {
                -webkit-transform: rotate(0deg)
            }
            to {
                -webkit-transform: rotate(360deg)
            }
        }

        @-moz-keyframes rotate {
            0% {
                -moz-transform: rotate(0deg)
            }
            to {
                -moz-transform: rotate(360deg)
            }
        }

        @keyframes rotate {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg)
            }
            to {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg)
            }
        }

        .right-side-toggle {
            position: relative
        }

        .right-side-toggle i {
            -webkit-transition-property: -webkit-transform;
            -webkit-transition-duration: 1s;
            -moz-transition-property: -moz-transform;
            -moz-transition-duration: 1s;
            transition-property: -webkit-transform;
            transition-property: transform;
            transition-property: transform, -webkit-transform;
            transition-duration: 1s;
            -webkit-animation-name: rotate;
            -webkit-animation-duration: 2s;
            -webkit-animation-iteration-count: infinite;
            -webkit-animation-timing-function: linear;
            -moz-animation-name: rotate;
            -moz-animation-duration: 2s;
            -moz-animation-iteration-count: infinite;
            -moz-animation-timing-function: linear;
            animation-name: rotate;
            animation-duration: 2s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
            position: absolute;
            top: 9px;
            left: 10px
        }

        .right-sidebar {
            position: fixed;
            right: -240px;
            width: 240px;
            display: none;
            z-index: 1100;
            background: #ffffff;
            top: 0px;
            padding-bottom: 20px;
            height: 100%;
            box-shadow: 5px 1px 40px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease
        }

        .right-sidebar .rpanel-title {
            display: block;
            padding: 24px 20px;
            color: #ffffff;
            text-transform: uppercase;
            font-size: 15px;
            background: #009efb
        }

        .right-sidebar .rpanel-title span {
            float: right;
            cursor: pointer;
            font-size: 11px
        }

        .right-sidebar .rpanel-title span:hover {
            color: #ffffff
        }

        .right-sidebar .r-panel-body {
            padding: 20px
        }

        .right-sidebar .r-panel-body ul {
            margin: 0px;
            padding: 0px
        }

        .right-sidebar .r-panel-body ul li {
            list-style: none;
            padding: 5px 0
        }

        .shw-rside {
            right: 0px;
            width: 240px;
            display: block
        }

        .chatonline img {
            margin-right: 10px;
            float: left;
            width: 30px
        }

        .chatonline li a {
            padding: 13px 0;
            float: left;
            width: 100%
        }

        .chatonline li a span {
            color: #54667a
        }

        .chatonline li a span small {
            display: block;
            font-size: 10px
        }

        ul#themecolors {
            display: block
        }

        ul#themecolors li {
            display: inline-block
        }

        ul#themecolors li:first-child {
            display: block
        }

        ul#themecolors li a {
            width: 50px;
            height: 50px;
            display: inline-block;
            margin: 5px;
            color: transparent;
            position: relative
        }

        ul#themecolors li a.working:before {
            content: "\f00c";
            font-family: "FontAwesome";
            font-size: 18px;
            line-height: 50px;
            width: 50px;
            height: 50px;
            position: absolute;
            top: 0;
            left: 0;
            color: #ffffff;
            text-align: center
        }

        .default-theme {
            background: #90a4ae
        }

        .green-theme {
            background: #55ce63
        }

        .yellow-theme {
            background: #ffbc34
        }

        .red-theme {
            background: #f62d51
        }

        .blue-theme {
            background: #009efb
        }

        .purple-theme {
            background: #7460ee
        }

        .megna-theme {
            background: #01c0c8
        }

        .default-dark-theme {
            background: #263238;
            background: -moz-linear-gradient(left, #263238 0%, #263238 23%, #90a4ae 23%, #90a4ae 99%);
            background: -webkit-linear-gradient(left, #263238 0%, #263238 23%, #90a4ae 23%, #90a4ae 99%);
            background: linear-gradient(to right, #263238 0%, #263238 23%, #90a4ae 23%, #90a4ae 99%)
        }

        .green-dark-theme {
            background: #263238;
            background: -moz-linear-gradient(left, #263238 0%, #263238 23%, #55ce63 23%, #55ce63 99%);
            background: -webkit-linear-gradient(left, #263238 0%, #263238 23%, #00c292 23%, #55ce63 99%);
            background: linear-gradient(to right, #263238 0%, #263238 23%, #55ce63 23%, #55ce63 99%)
        }

        .yellow-dark-theme {
            background: #263238;
            background: -moz-linear-gradient(left, #263238 0%, #263238 23%, #f62d51 23%, #f62d51 99%);
            background: -webkit-linear-gradient(left, #263238 0%, #263238 23%, #f62d51 23%, #f62d51 99%);
            background: linear-gradient(to right, #263238 0%, #263238 23%, #f62d51 23%, #f62d51 99%)
        }

        .blue-dark-theme {
            background: #263238;
            background: -moz-linear-gradient(left, #263238 0%, #263238 23%, #009efb 23%, #009efb 99%);
            background: -webkit-linear-gradient(left, #263238 0%, #263238 23%, #009efb 23%, #009efb 99%);
            background: linear-gradient(to right, #263238 0%, #263238 23%, #009efb 23%, #009efb 99%)
        }

        .purple-dark-theme {
            background: #263238;
            background: -moz-linear-gradient(left, #263238 0%, #263238 23%, #7460ee 23%, #7460ee 99%);
            background: -webkit-linear-gradient(left, #263238 0%, #263238 23%, #7460ee 23%, #7460ee 99%);
            background: linear-gradient(to right, #263238 0%, #263238 23%, #7460ee 23%, #7460ee 99%)
        }

        .megna-dark-theme {
            background: #263238;
            background: -moz-linear-gradient(left, #263238 0%, #263238 23%, #01c0c8 23%, #01c0c8 99%);
            background: -webkit-linear-gradient(left, #263238 0%, #263238 23%, #01c0c8 23%, #01c0c8 99%);
            background: linear-gradient(to right, #263238 0%, #263238 23%, #01c0c8 23%, #01c0c8 99%)
        }

        .red-dark-theme {
            background: #263238;
            background: -moz-linear-gradient(left, #263238 0%, #263238 23%, #f62d51 23%, #f62d51 99%);
            background: -webkit-linear-gradient(left, #263238 0%, #263238 23%, #f62d51 23%, #f62d51 99%);
            background: linear-gradient(to right, #263238 0%, #263238 23%, #f62d51 23%, #f62d51 99%)
        }

        .page-titles {
            padding-bottom: 20px
        }

        .footer {
            bottom: 0;
            color: #54667a;
            left: 0px;
            padding: 17px 15px;
            position: absolute;
            right: 0;
            border-top: 1px solid rgba(120, 130, 140, 0.13);
            background: #ffffff
        }

        .card {
            margin-bottom: 30px
        }

        .card .card-subtitle {
            font-weight: 300;
            margin-bottom: 15px;
            color: #90a4ae
        }

        .card-inverse .card-blockquote .blockquote-footer, .card-inverse .card-link, .card-inverse .card-subtitle, .card-inverse .card-text {
            color: rgba(255, 255, 255, 0.65)
        }

        .card-success {
            background: #55ce63;
            border-color: #55ce63
        }

        .card-danger {
            background: #f62d51;
            border-color: #f62d51
        }

        .card-warning {
            background: #ffbc34;
            border-color: #ffbc34
        }

        .card-info {
            background: #009efb;
            border-color: #009efb
        }

        .card-primary {
            background: #7460ee;
            border-color: #7460ee
        }

        .card-dark {
            background: #2f3d4a;
            border-color: #2f3d4a
        }

        .card-megna {
            background: #01c0c8;
            border-color: #01c0c8
        }

        .button-group .btn {
            margin-bottom: 5px;
            margin-right: 5px
        }

        .no-button-group .btn {
            margin-bottom: 5px;
            margin-right: 0px
        }

        .btn .text-active {
            display: none
        }

        .btn.active .text-active {
            display: inline-block
        }

        .btn.active .text {
            display: none
        }

        .card-actions {
            float: right
        }

        .card-actions a {
            cursor: pointer;
            color: #54667a;
            opacity: 0.7;
            padding-left: 7px;
            font-size: 13px
        }

        .card-actions a:hover {
            opacity: 1
        }

        .card-columns .card {
            margin-bottom: 20px
        }

        .collapsing {
            -webkit-transition: height .08s ease;
            transition: height .08s ease
        }

        .card-info {
            background: #009efb;
            border-color: #009efb
        }

        .card-primary {
            background: #7460ee;
            border-color: #7460ee
        }

        .card-outline-info {
            border-color: #009efb
        }

        .card-outline-info .card-header {
            background: #009efb;
            border-color: #009efb
        }

        .card-outline-inverse {
            border-color: #2f3d4a
        }

        .card-outline-inverse .card-header {
            background: #2f3d4a;
            border-color: #2f3d4a
        }

        .card-outline-warning {
            border-color: #ffbc34
        }

        .card-outline-warning .card-header {
            background: #ffbc34;
            border-color: #ffbc34
        }

        .card-outline-success {
            border-color: #55ce63
        }

        .card-outline-success .card-header {
            background: #55ce63;
            border-color: #55ce63
        }

        .card-outline-danger {
            border-color: #f62d51
        }

        .card-outline-danger .card-header {
            background: #f62d51;
            border-color: #f62d51
        }

        .card-outline-primary {
            border-color: #7460ee
        }

        .card-outline-primary .card-header {
            background: #7460ee;
            border-color: #7460ee
        }

        .bc-colored .breadcrumb-item, .bc-colored .breadcrumb-item a {
            color: #ffffff
        }

        .bc-colored .breadcrumb-item.active, .bc-colored .breadcrumb-item a.active {
            opacity: 0.7
        }

        .bc-colored .breadcrumb-item + .breadcrumb-item:before {
            color: rgba(255, 255, 255, 0.4)
        }

        .breadcrumb {
            margin-bottom: 0px
        }

        ul.list-icons {
            margin: 0px;
            padding: 0px
        }

        ul.list-icons li {
            list-style: none;
            line-height: 30px;
            margin: 5px 0;
            transition: 0.2s ease-in
        }

        ul.list-icons li a {
            color: #54667a
        }

        ul.list-icons li a:hover {
            color: #009efb
        }

        ul.list-icons li i {
            font-size: 13px;
            padding-right: 8px
        }

        ul.list-inline li {
            display: inline-block;
            padding: 0 8px
        }

        ul.two-part {
            margin: 0px
        }

        ul.two-part li {
            width: 48.8%
        }

        .accordion .card {
            margin-bottom: 0px !important
        }

        .flot-chart {
            display: block;
            height: 400px
        }

        .flot-chart-content {
            width: 100%;
            height: 100%
        }

        .flotTip, .jqstooltip {
            width: auto !important;
            height: auto !important;
            background: #263238;
            color: #ffffff;
            padding: 5px 10px
        }

        .chart {
            position: relative;
            display: inline-block;
            width: 100px;
            height: 100px;
            margin-top: 20px;
            margin-bottom: 20px;
            text-align: center
        }

        .chart canvas {
            position: absolute;
            top: 0;
            left: 0
        }

        .chart.chart-widget-pie {
            margin-top: 5px;
            margin-bottom: 5px
        }

        .pie-chart > span {
            left: 0;
            margin-top: -2px;
            position: absolute;
            right: 0;
            text-align: center;
            top: 50%;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%)
        }

        .chart > span > img {
            left: 0;
            margin-top: -2px;
            position: absolute;
            right: 0;
            text-align: center;
            top: 50%;
            width: 60%;
            height: 60%;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
            margin: 0 auto
        }

        .percent {
            display: inline-block;
            line-height: 100px;
            z-index: 2;
            font-weight: 600;
            font-size: 18px;
            color: #263238
        }

        .percent:after {
            content: '%';
            margin-left: 0.1em;
            font-size: .8em
        }

        .income-year, .total-revenue, .total-revenue2 {
            position: relative
        }

        .income-year .chartist-tooltip, .total-revenue2 .chartist-tooltip, .total-revenue .chartist-tooltip {
            border-radius: 60px
        }

        .income-year .ct-series-a .ct-line, .total-revenue2 .ct-series-a .ct-line, .total-revenue .ct-series-a .ct-line {
            stroke: #009efb;
            stroke-width: 2px
        }

        .income-year .ct-series-a .ct-point, .total-revenue2 .ct-series-a .ct-point, .total-revenue .ct-series-a .ct-point {
            stroke: #009efb;
            stroke-width: 7px
        }

        .income-year .ct-series-b .ct-line, .total-revenue2 .ct-series-b .ct-line, .total-revenue .ct-series-b .ct-line {
            stroke: #55ce63;
            stroke-width: 2px
        }

        .income-year .ct-series-b .ct-point, .total-revenue2 .ct-series-b .ct-point, .total-revenue .ct-series-b .ct-point {
            stroke: #55ce63;
            stroke-width: 7px
        }

        .income-year .ct-series-a .ct-area, .income-year .ct-series-b .ct-area, .total-revenue2 .ct-series-a .ct-area, .total-revenue2 .ct-series-b .ct-area, .total-revenue .ct-series-a .ct-area, .total-revenue .ct-series-b .ct-area {
            fill: transparent
        }

        .income-year .ct-series-a .ct-bar {
            stroke: #009efb
        }

        .income-year .ct-series-b .ct-bar {
            stroke: #55ce63
        }

        #sales-donute {
            position: relative
        }

        #sales-donute fill, #sales-donute path {
            stroke-width: 0px
        }

        .round-overlap {
            width: 150px;
            border: 2px solid rgba(120, 130, 140, 0.13);
            height: 150px;
            position: absolute;
            border-radius: 100%;
            font-size: 35px;
            text-align: center;
            margin: 0 auto;
            left: 0px;
            right: 0px;
            top: 25%
        }

        .round-overlap i {
            line-height: 150px
        }

        .stylish-table thead th {
            font-weight: 400;
            color: #90a4ae;
            border: 0px;
            border-bottom: 1px
        }

        .stylish-table tbody tr {
            border-left: 4px solid #ffffff
        }

        .stylish-table tbody tr.active, .stylish-table tbody tr:hover {
            border-left: 4px solid #009efb
        }

        .stylish-table tbody td {
            vertical-align: middle
        }

        .stylish-table tbody td h6 {
            font-weight: 500;
            margin-bottom: 0px;
            white-space: nowrap
        }

        .stylish-table tbody td small {
            line-height: 12px;
            white-space: nowrap
        }

        .total-revenue2 .ct-series-a .ct-area {
            fill: #e8fdeb
        }

        .total-revenue2 .ct-series-b .ct-area {
            fill: #e8fdeb
        }

        .total-sales {
            position: relative
        }

        .total-sales .chartist-tooltip {
            background: #55ce63
        }

        .total-sales .ct-series-a .ct-bar {
            stroke: #0f8edd
        }

        .total-sales .ct-series-b .ct-bar {
            stroke: #11a0f8
        }

        .total-sales .ct-series-c .ct-bar {
            stroke: #51bdff
        }

        .ct-chart {
            position: relative
        }

        .ct-chart .ct-series-a .ct-slice-donut {
            stroke: #55ce63
        }

        .ct-chart .ct-series-b .ct-slice-donut {
            stroke: #f2f7f8
        }

        .ct-chart .ct-series-c .ct-slice-donut {
            stroke: #009efb
        }

        #visitfromworld path.jvectormap-region.jvectormap-element {
            stroke-width: 1px;
            stroke: #90a4ae
        }

        .jvectormap-goback, .jvectormap-zoomin, .jvectormap-zoomout {
            background: #90a4ae
        }

        .browser td {
            vertical-align: middle;
            padding-left: 0px
        }

        #calendar .fc-today-button {
            display: none
        }

        .total-revenue4 {
            position: relative
        }

        .total-revenue4 .ct-series-a .ct-line {
            stroke: #009efb;
            stroke-width: 1px
        }

        .total-revenue4 .ct-series-a .ct-point {
            stroke: #009efb;
            stroke-width: 5px
        }

        .total-revenue4 .ct-series-b .ct-line {
            stroke: #55ce63;
            stroke-width: 1px
        }

        .total-revenue4 .ct-series-b .ct-point {
            stroke: #55ce63;
            stroke-width: 5px
        }

        .total-revenue4 .ct-series-a .ct-area {
            fill: #009efb;
            fill-opacity: 0.2
        }

        .total-revenue4 .ct-series-b .ct-area {
            fill: #55ce63;
            fill-opacity: 0.2
        }

        .sparkchart {
            margin-bottom: -2px
        }

        .btn-file {
            overflow: hidden;
            position: relative;
            vertical-align: middle
        }

        .btn-file > input {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            opacity: 0;
            filter: alpha(opacity=0);
            font-size: 23px;
            height: 100%;
            width: 100%;
            direction: ltr;
            cursor: pointer;
            border-radius: 0px
        }

        .fileinput .input-group-addon {
            border-right: 1px solid rgba(120, 130, 140, 0.13)
        }

        .fileinput .form-control {
            padding-top: 7px;
            padding-bottom: 5px;
            display: inline-block;
            margin-bottom: 0px;
            vertical-align: middle;
            cursor: text
        }

        .fileinput .thumbnail {
            overflow: hidden;
            display: inline-block;
            margin-bottom: 5px;
            vertical-align: middle;
            text-align: center
        }

        .fileinput .thumbnail > img {
            max-height: 100%
        }

        .fileinput .btn {
            vertical-align: middle
        }

        .fileinput-exists .fileinput-new, .fileinput-new .fileinput-exists {
            display: none
        }

        .fileinput-inline .fileinput-controls {
            display: inline
        }

        .fileinput-filename {
            vertical-align: middle;
            display: inline-block;
            overflow: hidden
        }

        .form-control .fileinput-filename {
            vertical-align: bottom
        }

        .fileinput.input-group > * {
            position: relative;
            z-index: 2
        }

        .fileinput.input-group > .btn-file {
            z-index: 1
        }

        .product-review {
            margin: 0px;
            padding: 25px
        }

        .product-review li {
            display: block;
            padding: 20px 0;
            list-style: none
        }

        .product-review li .font, .product-review li span {
            display: inline-block;
            margin-left: 10px
        }

        .social-profile {
            text-align: center;
            background: rgba(7, 10, 43, 0.8)
        }

        .customtab li a.nav-link, .profile-tab li a.nav-link {
            border: 0px;
            padding: 15px 20px;
            color: #54667a
        }

        .customtab li a.nav-link.active, .profile-tab li a.nav-link.active {
            border-bottom: 2px solid #009efb;
            color: #009efb
        }

        .customtab li a.nav-link:hover, .profile-tab li a.nav-link:hover {
            color: #009efb
        }

        .bootstrap-select:not([class*=col-]):not([class*=form-control]):not(.input-group-btn) {
            width: 100%
        }

        .bootstrap-select .dropdown-menu li a {
            display: block;
            padding: 7px 20px;
            clear: both;
            font-weight: 400;
            line-height: 1.42857143;
            color: #54667a;
            white-space: nowrap
        }

        .bootstrap-select .dropdown-menu li a:hover {
            color: #009efb;
            background: #f2f7f8
        }

        .bootstrap-touchspin .input-group-btn-vertical > .btn {
            padding: 9px 10px
        }

        .form-material .form-group {
            overflow: hidden
        }

        .form-material .form-control {
            background-color: transparent;
            background-position: center bottom, center calc(100% - 1px);
            background-repeat: no-repeat;
            background-size: 0 2px, 100% 1px;
            padding: 0;
            transition: background 0s ease-out 0s
        }

        .form-material .form-control, .form-material .form-control.focus, .form-material .form-control:focus {
            background-image: linear-gradient(#009efb, #009efb), linear-gradient(#d9d9d9, #d9d9d9);
            border: 0 none;
            border-radius: 0;
            box-shadow: none;
            float: none
        }

        .form-material .form-control.focus, .form-material .form-control:focus {
            background-size: 100% 2px, 100% 1px;
            outline: 0 none;
            transition-duration: 0.3s
        }

        .form-control-line .form-group {
            overflow: hidden
        }

        .form-control-line .form-control {
            border: 0px;
            border-radius: 0px;
            padding-left: 0px;
            border-bottom: 1px solid #d9d9d9
        }

        .form-control-line .form-control:focus {
            border-bottom: 1px solid #009efb
        }

        .floating-labels .form-group {
            position: relative
        }

        .floating-labels .form-control {
            padding: 10px 10px 10px 0;
            display: block;
            border: none;
            font-family: "Rubik", sans-serif;
            border-radius: 0px;
            border-bottom: 1px solid #d9d9d9
        }

        .floating-labels select.form-control > option {
            font-size: 14px
        }

        .floating-labels .has-error .form-control {
            border-bottom: 1px solid #f62d51
        }

        .floating-labels .has-warning .form-control {
            border-bottom: 1px solid #ffbc34
        }

        .floating-labels .has-success .form-control {
            border-bottom: 1px solid #55ce63
        }

        .floating-labels .form-control:focus {
            outline: none;
            border: none
        }

        .floating-labels label {
            color: #54667a;
            position: absolute;
            cursor: auto;
            top: 5px;
            transition: 0.2s ease all;
            -moz-transition: 0.2s ease all;
            -webkit-transition: 0.2s ease all
        }

        .floating-labels .form-control:focus ~ label, .floating-labels .form-control:valid ~ label {
            top: -20px;
            font-size: 12px;
            color: #263238
        }

        .floating-labels .bar {
            position: relative;
            display: block
        }

        .floating-labels .bar:after, .floating-labels .bar:before {
            content: '';
            height: 2px;
            width: 0;
            bottom: 1px;
            position: absolute;
            background: #009efb;
            transition: 0.2s ease all;
            -moz-transition: 0.2s ease all;
            -webkit-transition: 0.2s ease all
        }

        .floating-labels .bar:before {
            left: 50%
        }

        .floating-labels .bar:after {
            right: 50%
        }

        .floating-labels .form-control:focus ~ .bar:after, .floating-labels .form-control:focus ~ .bar:before {
            width: 50%
        }

        .floating-labels .highlight {
            position: absolute;
            height: 60%;
            width: 100px;
            top: 25%;
            left: 0;
            pointer-events: none;
            opacity: 0.5
        }

        .floating-labels .input-lg, .floating-labels .input-lg ~ label {
            font-size: 24px
        }

        .floating-labels .input-sm, .floating-labels .input-sm ~ label {
            font-size: 16px
        }

        .has-warning .bar:after, .has-warning .bar:before {
            background: #ffbc34
        }

        .has-success .bar:after, .has-success .bar:before {
            background: #55ce63
        }

        .has-error .bar:after, .has-error .bar:before {
            background: #f62d51
        }

        .has-warning .form-control:focus ~ label, .has-warning .form-control:valid ~ label {
            color: #ffbc34
        }

        .has-success .form-control:focus ~ label, .has-success .form-control:valid ~ label {
            color: #55ce63
        }

        .has-error .form-control:focus ~ label, .has-error .form-control:valid ~ label {
            color: #f62d51
        }

        .has-feedback label ~ .t-0 {
            top: 0
        }

        .form-group.error input, .form-group.error select, .form-group.error textarea {
            border: 1px solid #f62d51
        }

        .form-group.validate input, .form-group.validate select, .form-group.validate textarea {
            border: 1px solid #55ce63
        }

        .form-group.error .help-block ul {
            padding: 0px;
            color: #f62d51
        }

        .form-group.error .help-block ul li {
            list-style: none
        }

        .form-group.issue .help-block ul {
            padding: 0px;
            color: #ffbc34
        }

        .form-group.issue .help-block ul li {
            list-style: none
        }

        .pagination-circle li.active a {
            background: #55ce63 !important
        }

        .pagination-circle li a {
            width: 40px;
            height: 40px;
            background: #f2f7f8;
            border: 0px;
            text-align: center;
            border-radius: 100%
        }

        .pagination-circle li a:first-child, .pagination-circle li a:last-child {
            border-radius: 100% !important
        }

        .pagination-circle li a:hover {
            background: #55ce63;
            color: #ffffff
        }

        .pagination-circle li.disabled a {
            background: #f2f7f8 !important;
            color: rgba(120, 130, 140, 0.13) !important
        }

        .dropzone {
            border: 1px dashed #d9d9d9
        }

        .dropzone .dz-message {
            padding: 5% 0;
            margin: 0px
        }

        .asColorPicker-dropdown {
            max-width: 260px
        }

        .asColorPicker-trigger {
            position: absolute;
            top: 0;
            right: -35px;
            height: 38px;
            width: 37px;
            border: 0
        }

        .asColorPicker-clear {
            display: none;
            position: absolute;
            top: 5px;
            right: 10px;
            text-decoration: none
        }

        table th {
            font-weight: 400
        }

        .daterangepicker td.active, .daterangepicker td.active:hover {
            background-color: #009efb
        }

        .datepicker table tr td.today, .datepicker table tr td.today.disabled, .datepicker table tr td.today.disabled:hover, .datepicker table tr td.today:hover {
            background: #009efb;
            color: #ffffff
        }

        .datepicker td, .datepicker th {
            padding: 5px 10px
        }

        .icheck-list, .icolors {
            padding: 0;
            margin: 0;
            list-style: none
        }

        .icolors > li {
            padding: 0;
            margin: 2px;
            float: left;
            display: inline-block;
            height: 30px;
            width: 30px;
            background: #263238;
            text-align: center
        }

        .icolors > li.active:after {
            content: "\2713 ";
            color: #ffffff;
            line-height: 30px
        }

        .icolors > li:first-child {
            margin-left: 0
        }

        .icolors > li.orange {
            background: #f62d51
        }

        .icolors > li.yellow {
            background: #ffbc34
        }

        .icolors > li.info {
            background: #009efb
        }

        .icolors > li.green {
            background: #55ce63
        }

        .icolors > li.red {
            background: #fb3a3a
        }

        .icolors > li.purple {
            background: #7460ee
        }

        .icolors > li.blue {
            background: #02bec9
        }

        .icheck-list {
            float: left;
            padding-right: 50px;
            padding-top: 10px
        }

        .icheck-list li {
            padding-bottom: 5px
        }

        .icheck-list li label {
            padding-left: 10px
        }

        .note-icon-caret, .note-popover {
            display: none
        }

        .note-editor.note-frame {
            border: 1px solid #d9d9d9
        }

        .note-editor.note-frame .panel-heading {
            padding: 6px 10px 10px;
            border-bottom: 1px solid rgba(120, 130, 140, 0.13)
        }

        .label {
            display: inline-block
        }

        .table th, .table thead th {
            border: 0px
        }

        .color-table.primary-table thead th {
            background-color: #7460ee;
            color: #ffffff
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background: #f2f7f8
        }

        .color-table.success-table thead th {
            background-color: #55ce63;
            color: #ffffff
        }

        .color-table.info-table thead th {
            background-color: #009efb;
            color: #ffffff
        }

        .color-table.warning-table thead th {
            background-color: #ffbc34;
            color: #ffffff
        }

        .color-table.danger-table thead th {
            background-color: #f62d51;
            color: #ffffff
        }

        .color-table.inverse-table thead th {
            background-color: #2f3d4a;
            color: #ffffff
        }

        .color-table.dark-table thead th {
            background-color: #263238;
            color: #ffffff
        }

        .color-table.red-table thead th {
            background-color: #fb3a3a;
            color: #ffffff
        }

        .color-table.purple-table thead th {
            background-color: #7460ee;
            color: #ffffff
        }

        .color-table.muted-table thead th {
            background-color: #90a4ae;
            color: #ffffff
        }

        .color-bordered-table.primary-bordered-table {
            border: 2px solid #7460ee
        }

        .color-bordered-table.primary-bordered-table thead th {
            background-color: #7460ee;
            color: #ffffff
        }

        .color-bordered-table.success-bordered-table {
            border: 2px solid #55ce63
        }

        .color-bordered-table.success-bordered-table thead th {
            background-color: #55ce63;
            color: #ffffff
        }

        .color-bordered-table.info-bordered-table {
            border: 2px solid #009efb
        }

        .color-bordered-table.info-bordered-table thead th {
            background-color: #009efb;
            color: #ffffff
        }

        .color-bordered-table.warning-bordered-table {
            border: 2px solid #ffbc34
        }

        .color-bordered-table.warning-bordered-table thead th {
            background-color: #ffbc34;
            color: #ffffff
        }

        .color-bordered-table.danger-bordered-table {
            border: 2px solid #f62d51
        }

        .color-bordered-table.danger-bordered-table thead th {
            background-color: #f62d51;
            color: #ffffff
        }

        .color-bordered-table.inverse-bordered-table {
            border: 2px solid #2f3d4a
        }

        .color-bordered-table.inverse-bordered-table thead th {
            background-color: #2f3d4a;
            color: #ffffff
        }

        .color-bordered-table.dark-bordered-table {
            border: 2px solid #263238
        }

        .color-bordered-table.dark-bordered-table thead th {
            background-color: #263238;
            color: #ffffff
        }

        .color-bordered-table.red-bordered-table {
            border: 2px solid #fb3a3a
        }

        .color-bordered-table.red-bordered-table thead th {
            background-color: #fb3a3a;
            color: #ffffff
        }

        .color-bordered-table.purple-bordered-table {
            border: 2px solid #7460ee
        }

        .color-bordered-table.purple-bordered-table thead th {
            background-color: #7460ee;
            color: #ffffff
        }

        .color-bordered-table.muted-bordered-table {
            border: 2px solid #90a4ae
        }

        .color-bordered-table.muted-bordered-table thead th {
            background-color: #90a4ae;
            color: #ffffff
        }

        .full-color-table.full-primary-table {
            background-color: #f1effd
        }

        .full-color-table.full-primary-table thead th {
            background-color: #7460ee;
            border: 0 !important;
            color: #ffffff
        }

        .full-color-table.full-primary-table tbody td {
            border: 0 !important
        }

        .full-color-table.full-primary-table tr:hover {
            background-color: #7460ee;
            color: #ffffff
        }

        .full-color-table.full-success-table {
            background-color: #e8fdeb
        }

        .full-color-table.full-success-table thead th {
            background-color: #55ce63;
            border: 0 !important;
            color: #ffffff
        }

        .full-color-table.full-success-table tbody td {
            border: 0 !important
        }

        .full-color-table.full-success-table tr:hover {
            background-color: #55ce63;
            color: #ffffff
        }

        .full-color-table.full-info-table {
            background-color: #cfecfe
        }

        .full-color-table.full-info-table thead th {
            background-color: #009efb;
            border: 0 !important;
            color: #ffffff
        }

        .full-color-table.full-info-table tbody td {
            border: 0 !important
        }

        .full-color-table.full-info-table tr:hover {
            background-color: #009efb;
            color: #ffffff
        }

        .full-color-table.full-warning-table {
            background-color: #fff8ec
        }

        .full-color-table.full-warning-table thead th {
            background-color: #ffbc34;
            border: 0 !important;
            color: #ffffff
        }

        .full-color-table.full-warning-table tbody td {
            border: 0 !important
        }

        .full-color-table.full-warning-table tr:hover {
            background-color: #ffbc34;
            color: #ffffff
        }

        .full-color-table.full-danger-table {
            background-color: #f9e7eb
        }

        .full-color-table.full-danger-table thead th {
            background-color: #f62d51;
            border: 0 !important;
            color: #ffffff
        }

        .full-color-table.full-danger-table tbody td {
            border: 0 !important
        }

        .full-color-table.full-danger-table tr:hover {
            background-color: #f62d51;
            color: #ffffff
        }

        .full-color-table.full-inverse-table {
            background-color: #f6f6f6
        }

        .full-color-table.full-inverse-table thead th {
            background-color: #2f3d4a;
            border: 0 !important;
            color: #ffffff
        }

        .full-color-table.full-inverse-table tbody td {
            border: 0 !important
        }

        .full-color-table.full-inverse-table tr:hover {
            background-color: #2f3d4a;
            color: #ffffff
        }

        .full-color-table.full-dark-table {
            background-color: rgba(43, 43, 43, 0.8)
        }

        .full-color-table.full-dark-table thead th {
            background-color: #263238;
            border: 0 !important;
            color: #ffffff
        }

        .full-color-table.full-dark-table tbody td {
            border: 0 !important;
            color: #ffffff
        }

        .full-color-table.full-dark-table tr:hover {
            background-color: #263238;
            color: #ffffff
        }

        .full-color-table.full-red-table {
            background-color: #f9e7eb
        }

        .full-color-table.full-red-table thead th {
            background-color: #fb3a3a;
            border: 0 !important;
            color: #ffffff
        }

        .full-color-table.full-red-table tbody td {
            border: 0 !important
        }

        .full-color-table.full-red-table tr:hover {
            background-color: #fb3a3a;
            color: #ffffff
        }

        .full-color-table.full-purple-table {
            background-color: #f1effd
        }

        .full-color-table.full-purple-table thead th {
            background-color: #7460ee;
            border: 0 !important;
            color: #ffffff
        }

        .full-color-table.full-purple-table tbody td {
            border: 0 !important
        }

        .full-color-table.full-purple-table tr:hover {
            background-color: #7460ee;
            color: #ffffff
        }

        .full-color-table.full-muted-table {
            background-color: rgba(152, 166, 173, 0.2)
        }

        .full-color-table.full-muted-table thead th {
            background-color: #90a4ae;
            border: 0 !important;
            color: #ffffff
        }

        .full-color-table.full-muted-table tbody td {
            border: 0 !important
        }

        .full-color-table.full-muted-table tr:hover {
            background-color: #90a4ae;
            color: #ffffff
        }

        .dt-buttons {
            display: inline-block;
            padding-top: 5px
        }

        .dt-buttons .dt-button {
            padding: 5px 15px;
            border-radius: 4px;
            background: #009efb;
            color: #ffffff;
            margin-right: 3px
        }

        .dt-buttons .dt-button:hover {
            background: #2f3d4a
        }

        .dataTables_info, .dataTables_length {
            display: inline-block
        }

        .dataTables_filter {
            float: right
        }

        .dataTables_filter input {
            border: 1px solid #d9d9d9
        }

        table.dataTable thead .sorting, table.dataTable thead .sorting_asc, table.dataTable thead .sorting_asc_disabled, table.dataTable thead .sorting_desc, table.dataTable thead .sorting_desc_disabled {
            background: transparent
        }

        table.dataTable thead .sorting_asc:after {
            content: "\f0de";
            margin-left: 10px;
            font-family: fontawesome !important;
            cursor: pointer
        }

        table.dataTable thead .sorting_desc:after {
            content: "\f0dd";
            margin-left: 10px;
            font-family: fontawesome !important;
            cursor: pointer
        }

        table.dataTable thead .sorting:after {
            content: "\f0dc";
            margin-left: 10px;
            font-family: fontawesome !important;
            cursor: pointer;
            color: rgba(50, 50, 50, 0.5)
        }

        .dataTables_wrapper .dataTables_paginate {
            float: right;
            text-align: right;
            padding-top: 0.25em
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            box-sizing: border-box;
            display: inline-block;
            min-width: 1.5em;
            padding: 0.5em 1em;
            margin-left: 2px;
            text-align: center;
            text-decoration: none !important;
            cursor: pointer;
            *cursor: hand;
            color: #54667a !important;
            border: 1px solid transparent;
            border-radius: 2px
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            color: #ffffff !important;
            border: 1px solid #009efb;
            background-color: #009efb
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover {
            cursor: default;
            color: #54667a !important;
            border: 1px solid transparent;
            background: transparent;
            box-shadow: none
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            color: white !important;
            border: 1px solid #7460ee;
            background-color: #7460ee
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:active {
            outline: none;
            background-color: #54667a
        }

        .dataTables_wrapper .dataTables_paginate .ellipsis {
            padding: 0 1em
        }

        .tablesaw-bar .btn-group label {
            color: #54667a !important
        }

        .dt-bootstrap {
            display: block
        }

        .paging_simple_numbers .pagination .paginate_button {
            padding: 0px;
            background: #ffffff
        }

        .paging_simple_numbers .pagination .paginate_button:hover {
            background: #ffffff
        }

        .paging_simple_numbers .pagination .paginate_button a {
            padding: 5px 10px;
            border-radius: 4px;
            border: 0px
        }

        .paging_simple_numbers .pagination .paginate_button.active a, .paging_simple_numbers .pagination .paginate_button:hover a {
            background: #009efb;
            color: #ffffff
        }

        .footable .pagination {
            display: inline-block;
            padding: 8px 0
        }

        .footable .pagination li {
            padding: 0px;
            margin: 0 1px;
            display: inline-block
        }

        .footable .pagination li a {
            padding: 5px 10px
        }

        .footable .pagination li a.active, .footable .pagination li a:hover {
            background: #009efb;
            color: #ffffff;
            border-radius: 4px
        }

        .footable .pagination li.active a {
            color: #ffffff;
            border-radius: 4px
        }

        .footable-odd {
            background: #f2f7f8
        }

        .icon-list-demo div {
            cursor: pointer;
            line-height: 60px;
            white-space: nowrap;
            color: #54667a
        }

        .icon-list-demo div:hover {
            color: #263238
        }

        .icon-list-demo div p {
            margin: 10px 0;
            padding: 5px 0
        }

        .icon-list-demo i {
            -webkit-transition: all 0.2s;
            -webkit-transition: font-size .2s;
            display: inline-block;
            font-size: 18px;
            margin: 0 15px 0 10px;
            text-align: left;
            transition: all 0.2s;
            transition: font-size .2s;
            vertical-align: middle;
            transition: all 0.3s ease 0s
        }

        .icon-list-demo .col-3, .icon-list-demo .col-md-4 {
            border-radius: 4px
        }

        .icon-list-demo .col-3:hover, .icon-list-demo .col-md-4:hover {
            background-color: #ebf3f5
        }

        .icon-list-demo .div:hover i {
            font-size: 2em
        }

        .material-icon-list-demo .mdi {
            font-size: 21px
        }

        .grid-stack-item-content {
            background: #fff;
            color: #2b2b2b;
            text-align: center;
            font-size: 20px
        }

        .grid-stack > .grid-stack-item > .grid-stack-item-content {
            border: 1px solid rgba(120, 130, 140, 0.13)
        }

        .bootstrap-switch, .bootstrap-switch .bootstrap-switch-container {
            border-radius: 2px
        }

        .bootstrap-switch .bootstrap-switch-handle-on {
            border-bottom-left-radius: 2px;
            border-top-left-radius: 2px
        }

        .bootstrap-switch .bootstrap-switch-handle-off {
            border-bottom-right-radius: 2px;
            border-top-right-radius: 2px
        }

        .bootstrap-switch .bootstrap-switch-handle-off.bootstrap-switch-primary, .bootstrap-switch .bootstrap-switch-handle-on.bootstrap-switch-primary {
            color: #ffffff;
            background: #7460ee
        }

        .bootstrap-switch .bootstrap-switch-handle-off.bootstrap-switch-info, .bootstrap-switch .bootstrap-switch-handle-on.bootstrap-switch-info {
            color: #ffffff;
            background: #009efb
        }

        .bootstrap-switch .bootstrap-switch-handle-off.bootstrap-switch-success, .bootstrap-switch .bootstrap-switch-handle-on.bootstrap-switch-success {
            color: #ffffff;
            background: #55ce63
        }

        .bootstrap-switch .bootstrap-switch-handle-off.bootstrap-switch-warning, .bootstrap-switch .bootstrap-switch-handle-on.bootstrap-switch-warning {
            color: #ffffff;
            background: #ffbc34
        }

        .bootstrap-switch .bootstrap-switch-handle-off.bootstrap-switch-danger, .bootstrap-switch .bootstrap-switch-handle-on.bootstrap-switch-danger {
            color: #ffffff;
            background: #f62d51
        }

        .bootstrap-switch .bootstrap-switch-handle-off.bootstrap-switch-default, .bootstrap-switch .bootstrap-switch-handle-on.bootstrap-switch-default {
            color: #263238;
            background: #f2f7f8
        }

        .onoffswitch {
            position: relative;
            width: 90px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none
        }

        .onoffswitch-checkbox {
            display: none
        }

        .onoffswitch-label {
            display: block;
            overflow: hidden;
            cursor: pointer;
            border: 2px solid #55ce63;
            border-radius: 20px
        }

        .onoffswitch-inner {
            display: block;
            width: 200%;
            margin-left: -100%;
            transition: margin 0.3s ease-in 0s
        }

        .onoffswitch-inner:after, .onoffswitch-inner:before {
            display: block;
            float: left;
            width: 50%;
            height: 30px;
            padding: 0;
            line-height: 30px;
            font-size: 14px;
            color: white;
            box-sizing: border-box
        }

        .onoffswitch-inner:before {
            content: "ON";
            padding-left: 27px;
            background-color: #55ce63;
            color: #FFFFFF
        }

        .onoffswitch-inner:after {
            content: "OFF";
            padding-right: 24px;
            background-color: #EEEEEE;
            color: #999999;
            text-align: right
        }

        .onoffswitch-switch {
            display: block;
            width: 23px;
            margin: 6px;
            background: #FFFFFF;
            position: absolute;
            top: 0;
            bottom: 0;
            right: 56px;
            border: 2px solid #55ce63;
            border-radius: 20px;
            transition: all 0.3s ease-in 0s
        }

        .onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-inner {
            margin-left: 0
        }

        .onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-switch {
            right: 0px
        }

        .dp-selected[style] {
            background-color: #009efb !important
        }

        .datepaginator-lg .pagination li a, .datepaginator-sm .pagination li a, .datepaginator .pagination li a {
            padding: 0 5px;
            height: 60px;
            border: 1px solid rgba(120, 130, 140, 0.13);
            float: left;
            position: relative
        }

        .model_img {
            cursor: pointer
        }

        .show-grid {
            margin-bottom: 10px;
            padding: 0 15px
        }

        .show-grid [class^=col-] {
            padding-top: 10px;
            padding-bottom: 10px;
            border: 1px solid #d9d9d9;
            background-color: #f2f7f8
        }

        .vtabs {
            display: table
        }

        .vtabs .tabs-vertical {
            width: 150px;
            border-bottom: 0px;
            border-right: 1px solid rgba(120, 130, 140, 0.13);
            display: table-cell;
            vertical-align: top
        }

        .vtabs .tabs-vertical li .nav-link {
            color: #263238;
            margin-bottom: 10px;
            border: 0px;
            border-radius: 4px 0 0 4px
        }

        .vtabs .tab-content {
            display: table-cell;
            padding: 20px;
            vertical-align: top
        }

        .tabs-vertical li .nav-link.active, .tabs-vertical li .nav-link.active:focus, .tabs-vertical li .nav-link:hover {
            background: #009efb;
            border: 0px;
            color: #ffffff
        }

        .customvtab .tabs-vertical li .nav-link.active, .customvtab .tabs-vertical li .nav-link:focus, .customvtab .tabs-vertical li .nav-link:hover {
            background: #ffffff;
            border: 0px;
            border-right: 2px solid #009efb;
            margin-right: -1px;
            color: #009efb
        }

        .tabcontent-border {
            border: 1px solid #ddd;
            border-top: 0px
        }

        .customtab2 li a.nav-link {
            border: 0px;
            margin-right: 3px;
            color: #54667a
        }

        .customtab2 li a.nav-link.active {
            background: #009efb;
            color: #ffffff
        }

        .customtab2 li a.nav-link:hover {
            color: #ffffff;
            background: #009efb
        }

        .progress-bar.active, .progress.active .progress-bar {
            -webkit-animation: progress-bar-stripes 2s linear infinite;
            -o-animation: progress-bar-stripes 2s linear infinite;
            animation: progress-bar-stripes 2s linear infinite
        }

        .progress-vertical {
            min-height: 250px;
            height: 250px;
            position: relative;
            display: inline-block;
            margin-bottom: 0;
            margin-right: 20px
        }

        .progress-vertical-bottom {
            min-height: 250px;
            height: 250px;
            position: relative;
            display: inline-block;
            margin-bottom: 0;
            margin-right: 20px;
            -webkit-transform: rotate(180deg);
            -ms-transform: rotate(180deg);
            transform: rotate(180deg)
        }

        .progress-animated {
            -webkit-animation-duration: 5s;
            -webkit-animation-name: myanimation;
            -webkit-transition: 5s all;
            animation-duration: 5s;
            animation-name: myanimation;
            transition: 5s all
        }

        @-webkit-keyframes myanimation {
            0% {
                width: 0
            }
        }

        @keyframes myanimation {
            0% {
                width: 0
            }
        }

        .jq-icon-info {
            background-color: #009efb;
            color: #ffffff
        }

        .jq-icon-success {
            background-color: #55ce63;
            color: #ffffff
        }

        .jq-icon-error {
            background-color: #f62d51;
            color: #ffffff
        }

        .jq-icon-warning {
            background-color: #ffbc34;
            color: #ffffff
        }

        .alert-rounded {
            border-radius: 60px
        }

        .list-group a.list-group-item:hover {
            background: #f2f7f8
        }

        .list-group-item.active, .list-group .list-group-item.active:hover {
            background: #009efb;
            border-color: #009efb
        }

        .list-group-item.disabled {
            color: #90a4ae;
            background: #f2f7f8
        }

        .media {
            border: 1px solid rgba(120, 130, 140, 0.13);
            margin-bottom: 10px;
            padding: 15px
        }

        .el-element-overlay .white-box {
            padding: 0px
        }

        .el-element-overlay .el-card-item {
            position: relative;
            padding-bottom: 25px
        }

        .el-element-overlay .el-card-item .el-card-avatar {
            margin-bottom: 15px
        }

        .el-element-overlay .el-card-item .el-card-content {
            text-align: center
        }

        .el-element-overlay .el-card-item .el-card-content h3 {
            margin: 0px
        }

        .el-element-overlay .el-card-item .el-card-content a {
            color: #54667a
        }

        .el-element-overlay .el-card-item .el-card-content a:hover {
            color: #009efb
        }

        .el-element-overlay .el-card-item .el-overlay-1 {
            width: 100%;
            height: 100%;
            overflow: hidden;
            position: relative;
            text-align: center;
            cursor: default
        }

        .el-element-overlay .el-card-item .el-overlay-1 img {
            display: block;
            position: relative;
            -webkit-transition: all .4s linear;
            transition: all .4s linear;
            width: 100%;
            height: auto
        }

        .el-element-overlay .el-card-item .el-overlay-1:hover img {
            -ms-transform: scale(1.2) translateZ(0);
            -webkit-transform: scale(1.2) translateZ(0)
        }

        .el-element-overlay .el-card-item .el-overlay-1 .el-info {
            text-decoration: none;
            display: inline-block;
            text-transform: uppercase;
            color: #ffffff;
            background-color: transparent;
            filter: alpha(opacity=0);
            -webkit-transition: all .2s ease-in-out;
            transition: all .2s ease-in-out;
            padding: 0;
            margin: auto;
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            transform: translateY(-50%) translateZ(0);
            -webkit-transform: translateY(-50%) translateZ(0);
            -ms-transform: translateY(-50%) translateZ(0)
        }

        .el-element-overlay .el-card-item .el-overlay-1 .el-info > li {
            list-style: none;
            display: inline-block;
            margin: 0 3px
        }

        .el-element-overlay .el-card-item .el-overlay-1 .el-info > li a {
            border-color: #ffffff;
            color: #ffffff;
            padding: 12px 15px 10px
        }

        .el-element-overlay .el-card-item .el-overlay-1 .el-info > li a:hover {
            background: #009efb;
            border-color: #009efb
        }

        .el-element-overlay .el-card-item .el-overlay {
            width: 100%;
            height: 100%;
            position: absolute;
            overflow: hidden;
            top: 0;
            left: 0;
            opacity: 0;
            background-color: rgba(0, 0, 0, 0.7);
            -webkit-transition: all .4s ease-in-out;
            transition: all .4s ease-in-out
        }

        .el-element-overlay .el-card-item .el-overlay-1:hover .el-overlay {
            opacity: 1;
            filter: alpha(opacity=100);
            -webkit-transform: translateZ(0);
            -ms-transform: translateZ(0);
            transform: translateZ(0)
        }

        .el-element-overlay .el-card-item .el-overlay-1 .scrl-dwn {
            top: -100%
        }

        .el-element-overlay .el-card-item .el-overlay-1 .scrl-up {
            top: 100%;
            height: 0px
        }

        .el-element-overlay .el-card-item .el-overlay-1:hover .scrl-dwn {
            top: 0px
        }

        .el-element-overlay .el-card-item .el-overlay-1:hover .scrl-up {
            top: 0px;
            height: 100%
        }

        .timeline {
            position: relative;
            padding: 20px 0 20px;
            list-style: none;
            max-width: 1200px;
            margin: 0 auto
        }

        .timeline:before {
            content: " ";
            position: absolute;
            top: 0;
            bottom: 0;
            left: 50%;
            width: 3px;
            margin-left: -1.5px;
            background-color: #f2f7f8
        }

        .timeline > li {
            position: relative;
            margin-bottom: 20px
        }

        .timeline > li:after, .timeline > li:before {
            content: " ";
            display: table
        }

        .timeline > li:after {
            clear: both
        }

        .timeline > li:after, .timeline > li:before {
            content: " ";
            display: table
        }

        .timeline > li:after {
            clear: both
        }

        .timeline > li > .timeline-panel {
            float: left;
            position: relative;
            width: 46%;
            padding: 20px;
            border: 1px solid rgba(120, 130, 140, 0.13);
            border-radius: 4px;
            -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.05);
            box-shadow: 0 1px 6px rgba(0, 0, 0, 0.05)
        }

        .timeline > li > .timeline-panel:before {
            content: " ";
            display: inline-block;
            position: absolute;
            top: 26px;
            right: -8px;
            border-top: 8px solid transparent;
            border-right: 0 solid rgba(120, 130, 140, 0.13);
            border-bottom: 8px solid transparent;
            border-left: 8px solid rgba(120, 130, 140, 0.13)
        }

        .timeline > li > .timeline-panel:after {
            content: " ";
            display: inline-block;
            position: absolute;
            top: 27px;
            right: -7px;
            border-top: 7px solid transparent;
            border-right: 0 solid #ffffff;
            border-bottom: 7px solid transparent;
            border-left: 7px solid #ffffff
        }

        .timeline > li > .timeline-badge {
            z-index: 100;
            position: absolute;
            top: 16px;
            left: 50%;
            width: 50px;
            height: 50px;
            margin-left: -25px;
            border-radius: 50% 50% 50% 50%;
            text-align: center;
            font-size: 1.4em;
            line-height: 50px;
            color: #fff;
            overflow: hidden;
            background-color: #2f3d4a
        }

        .timeline > li.timeline-inverted > .timeline-panel {
            float: right
        }

        .timeline > li.timeline-inverted > .timeline-panel:before {
            right: auto;
            left: -8px;
            border-right-width: 8px;
            border-left-width: 0
        }

        .timeline > li.timeline-inverted > .timeline-panel:after {
            right: auto;
            left: -7px;
            border-right-width: 7px;
            border-left-width: 0
        }

        .timeline-badge.primary {
            background-color: #7460ee !important
        }

        .timeline-badge.success {
            background-color: #55ce63 !important
        }

        .timeline-badge.warning {
            background-color: #ffbc34 !important
        }

        .timeline-badge.danger {
            background-color: #f62d51 !important
        }

        .timeline-badge.info {
            background-color: #009efb !important
        }

        .timeline-title {
            margin-top: 0;
            color: inherit;
            font-weight: 400
        }

        .timeline-body > p, .timeline-body > ul {
            margin-bottom: 0
        }

        .timeline-body > p + p {
            margin-top: 5px
        }

        .cd-horizontal-timeline .events a {
            padding-bottom: 6px;
            color: #009efb
        }

        .cd-horizontal-timeline .events a.selected:after, .cd-horizontal-timeline .filling-line {
            background: #009efb
        }

        .cd-horizontal-timeline .events a.selected:after {
            border-color: #009efb
        }

        .myadmin-dd .dd-list .dd-item .dd-handle {
            background: #ffffff;
            border: 1px solid rgba(120, 130, 140, 0.13);
            padding: 8px 16px;
            height: auto;
            font-family: "Rubik", sans-serif;
            font-weight: 400;
            border-radius: 0
        }

        .myadmin-dd-empty .dd-list .dd3-content {
            height: auto;
            border: 1px solid rgba(120, 130, 140, 0.13);
            padding: 8px 16px 8px 46px;
            background: #ffffff;
            font-weight: 400
        }

        .myadmin-dd-empty .dd-list .dd3-handle {
            border: 1px solid rgba(120, 130, 140, 0.13);
            border-bottom: 0;
            background: #ffffff;
            height: 36px;
            width: 36px
        }

        .dd3-handle:before {
            color: #54667a;
            top: 7px
        }

        .ribbon-wrapper, .ribbon-wrapper-bottom, .ribbon-wrapper-reverse, .ribbon-wrapper-right-bottom {
            position: relative;
            padding: 50px 15px 15px 15px
        }

        .ribbon-vwrapper {
            padding: 15px 15px 15px 50px;
            position: relative
        }

        .ribbon-overflow {
            overflow: hidden
        }

        .ribbon-vwrapper-reverse {
            padding: 15px 50px 15px 15px
        }

        .ribbon-wrapper-bottom {
            padding: 15px 15px 50px 50px
        }

        .ribbon-wrapper-right-bottom {
            padding: 15px 50px 50px 15px
        }

        .ribbon-content {
            margin-bottom: 0px
        }

        .ribbon {
            padding: 0 20px;
            height: 30px;
            line-height: 30px;
            clear: left;
            position: absolute;
            top: 12px;
            left: -2px;
            color: #ffffff
        }

        .ribbon-bookmark:before {
            position: absolute;
            top: 0;
            left: 100%;
            display: block;
            width: 0;
            height: 0;
            content: '';
            border: 15px solid #263238;
            border-right: 10px solid transparent
        }

        .ribbon-right {
            left: auto;
            right: -2px
        }

        .ribbon-bookmark.ribbon-right:before {
            right: 100%;
            left: auto;
            border-right: 15px solid #263238;
            border-left: 10px solid transparent
        }

        .ribbon-vertical-l, .ribbon-vertical-r {
            clear: none;
            padding: 0 5px;
            height: 70px;
            width: 30px;
            line-height: 70px;
            text-align: center;
            left: 12px;
            top: -2px
        }

        .ribbon-vertical-r {
            left: auto;
            right: 12px
        }

        .ribbon-bookmark.ribbon-vertical-l:before, .ribbon-bookmark.ribbon-vertical-r:before {
            top: 100%;
            left: 0;
            margin-top: -14px;
            border-right: 15px solid #263238;
            border-bottom: 10px solid transparent
        }

        .ribbon-badge {
            top: 15px;
            overflow: hidden;
            left: -90px;
            width: 100%;
            text-align: center;
            -webkit-transform: rotate(-45deg);
            -ms-transform: rotate(-45deg);
            -o-transform: rotate(-45deg);
            transform: rotate(-45deg)
        }

        .ribbon-badge.ribbon-right {
            left: auto;
            right: -90px;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            -o-transform: rotate(45deg);
            transform: rotate(45deg)
        }

        .ribbon-badge.ribbon-bottom {
            top: auto;
            bottom: 15px;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            -o-transform: rotate(45deg);
            transform: rotate(45deg)
        }

        .ribbon-badge.ribbon-right.ribbon-bottom {
            -webkit-transform: rotate(-45deg);
            -ms-transform: rotate(-45deg);
            -o-transform: rotate(-45deg);
            transform: rotate(-45deg)
        }

        .ribbon-corner {
            top: 0;
            left: 0;
            background-color: transparent !important;
            padding: 6px 0 0 10px
        }

        .ribbon-corner i {
            position: relative
        }

        .ribbon-corner:before {
            position: absolute;
            top: 0;
            left: 0;
            width: 0;
            height: 0;
            content: '';
            border: 30px solid transparent;
            border-top-color: #009efb;
            border-left-color: #009efb
        }

        .ribbon-corner.ribbon-right:before {
            right: 0;
            left: auto;
            border-right-color: #526069;
            border-left-color: transparent
        }

        .ribbon-corner.ribbon-right {
            right: 0;
            left: auto;
            padding: 6px 10px 0 0
        }

        .ribbon-corner.ribbon-bottom:before {
            top: auto;
            bottom: 0;
            border-top-color: transparent;
            border-bottom-color: #526069
        }

        .ribbon-corner.ribbon-bottom {
            bottom: 0;
            top: auto;
            padding: 0 10px 6px 10px
        }

        .ribbon-custom {
            background: #009efb
        }

        .ribbon-bookmark.ribbon-right.ribbon-custom:before {
            border-right-color: #009efb;
            border-left-color: transparent
        }

        .ribbon-bookmark.ribbon-vertical-l.ribbon-custom:before, .ribbon-bookmark.ribbon-vertical-r.ribbon-custom:before {
            border-right-color: #009efb;
            border-bottom-color: transparent
        }

        .ribbon-primary {
            background: #7460ee
        }

        .ribbon-bookmark.ribbon-primary:before {
            border-color: #7460ee;
            border-right-color: transparent
        }

        .ribbon-bookmark.ribbon-right.ribbon-primary:before {
            border-right-color: #7460ee;
            border-left-color: transparent
        }

        .ribbon-bookmark.ribbon-vertical-l.ribbon-primary:before, .ribbon-bookmark.ribbon-vertical-r.ribbon-primary:before {
            border-right-color: #7460ee;
            border-bottom-color: transparent
        }

        .ribbon-primary.ribbon-corner:before {
            border-top-color: #7460ee;
            border-left-color: #7460ee
        }

        .ribbon-primary.ribbon-corner.ribbon-right:before {
            border-right-color: #7460ee;
            border-left-color: transparent
        }

        .ribbon-primary.ribbon-corner.ribbon-bottom:before {
            border-top-color: transparent;
            border-bottom-color: #7460ee
        }

        .ribbon-success {
            background: #55ce63
        }

        .ribbon-bookmark.ribbon-success:before {
            border-color: #55ce63;
            border-right-color: transparent
        }

        .ribbon-bookmark.ribbon-right.ribbon-success:before {
            border-right-color: #55ce63;
            border-left-color: transparent
        }

        .ribbon-bookmark.ribbon-vertical-l.ribbon-success:before, .ribbon-bookmark.ribbon-vertical-r.ribbon-success:before {
            border-right-color: #55ce63;
            border-bottom-color: transparent
        }

        .ribbon-success.ribbon-corner:before {
            border-top-color: #55ce63;
            border-left-color: #55ce63
        }

        .ribbon-success.ribbon-corner.ribbon-right:before {
            border-right-color: #55ce63;
            border-left-color: transparent
        }

        .ribbon-success.ribbon-corner.ribbon-bottom:before {
            border-top-color: transparent;
            border-bottom-color: #55ce63
        }

        .ribbon-info {
            background: #009efb
        }

        .ribbon-bookmark.ribbon-info:before {
            border-color: #009efb;
            border-right-color: transparent
        }

        .ribbon-bookmark.ribbon-right.ribbon-info:before {
            border-right-color: #009efb;
            border-left-color: transparent
        }

        .ribbon-bookmark.ribbon-vertical-l.ribbon-info:before, .ribbon-bookmark.ribbon-vertical-r.ribbon-info:before {
            border-right-color: #009efb;
            border-bottom-color: transparent
        }

        .ribbon-info.ribbon-corner:before {
            border-top-color: #009efb;
            border-left-color: #009efb
        }

        .ribbon-info.ribbon-corner.ribbon-right:before {
            border-right-color: #009efb;
            border-left-color: transparent
        }

        .ribbon-info.ribbon-corner.ribbon-bottom:before {
            border-top-color: transparent;
            border-bottom-color: #009efb
        }

        .ribbon-warning {
            background: #ffbc34
        }

        .ribbon-bookmark.ribbon-warning:before {
            border-color: #ffbc34;
            border-right-color: transparent
        }

        .ribbon-bookmark.ribbon-right.ribbon-warning:before {
            border-right-color: #ffbc34;
            border-left-color: transparent
        }

        .ribbon-bookmark.ribbon-vertical-l.ribbon-warning:before, .ribbon-bookmark.ribbon-vertical-r.ribbon-warning:before {
            border-right-color: #ffbc34;
            border-bottom-color: transparent
        }

        .ribbon-warning.ribbon-corner:before {
            border-top-color: #ffbc34;
            border-left-color: #ffbc34
        }

        .ribbon-warning.ribbon-corner.ribbon-right:before {
            border-right-color: #ffbc34;
            border-left-color: transparent
        }

        .ribbon-warning.ribbon-corner.ribbon-bottom:before {
            border-top-color: transparent;
            border-bottom-color: #ffbc34
        }

        .ribbon-danger {
            background: #f62d51
        }

        .ribbon-bookmark.ribbon-danger:before {
            border-color: #f62d51;
            border-right-color: transparent
        }

        .ribbon-bookmark.ribbon-right.ribbon-danger:before {
            border-right-color: #f62d51;
            border-left-color: transparent
        }

        .ribbon-bookmark.ribbon-vertical-l.ribbon-danger:before, .ribbon-bookmark.ribbon-vertical-r.ribbon-danger:before {
            border-right-color: #f62d51;
            border-bottom-color: transparent
        }

        .ribbon-danger.ribbon-corner:before {
            border-top-color: #f62d51;
            border-left-color: #f62d51
        }

        .ribbon-danger.ribbon-corner.ribbon-right:before {
            border-right-color: #f62d51;
            border-left-color: transparent
        }

        .ribbon-danger.ribbon-corner.ribbon-bottom:before {
            border-top-color: transparent;
            border-bottom-color: #f62d51
        }

        .ribbon-default {
            background: #263238
        }

        .ribbon-bookmark.ribbon-default:before {
            border-color: #263238;
            border-right-color: transparent
        }

        .ribbon-bookmark.ribbon-right.ribbon-default:before {
            border-right-color: #263238;
            border-left-color: transparent
        }

        .ribbon-bookmark.ribbon-vertical-l.ribbon-default:before, .ribbon-bookmark.ribbon-vertical-r.ribbon-default:before {
            border-right-color: #263238;
            border-bottom-color: transparent
        }

        .ribbon-default.ribbon-corner:before {
            border-top-color: #263238;
            border-left-color: #263238
        }

        .ribbon-default.ribbon-corner.ribbon-right:before {
            border-right-color: #263238;
            border-left-color: transparent
        }

        .ribbon-default.ribbon-corner.ribbon-bottom:before {
            border-top-color: transparent;
            border-bottom-color: #263238
        }

        #idletimeout {
            background: #009efb;
            border: 3px solid #009efb;
            color: #fff;
            font-family: arial, sans-serif;
            text-align: center;
            font-size: 12px;
            padding: 10px;
            position: relative;
            top: 0px;
            left: 0;
            right: 0;
            z-index: 100000;
            display: none
        }

        #idletimeout a {
            color: #ffffff;
            font-weight: bold
        }

        #idletimeout span {
            font-weight: bold
        }

        .mytooltip:hover .tooltip-content2, .mytooltip:hover .tooltip-content2 i {
            opacity: 1;
            font-size: 18px;
            pointer-events: auto;
            -webkit-transform: translate3d(0, 0, 0) scale3d(1, 1, 1);
            transform: translate3d(0, 0, 0) scale3d(1, 1, 1)
        }

        .mytooltip:hover .tooltip-content4, .mytooltip:hover .tooltip-text2 {
            pointer-events: auto;
            opacity: 1;
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0)
        }

        .mytooltip {
            display: inline;
            position: relative;
            z-index: 9999
        }

        .mytooltip:hover .tooltip-item:after {
            pointer-events: auto
        }

        .mytooltip:hover .tooltip-content {
            pointer-events: auto;
            opacity: 1;
            -webkit-transform: translate3d(0, 0, 0) rotate3d(0, 0, 0, 0);
            transform: translate3d(0, 0, 0) rotate3d(0, 0, 0, 0)
        }

        .mytooltip:hover .tooltip-content3 {
            opacity: 1;
            pointer-events: auto;
            -webkit-transform: scale3d(1, 1, 1);
            transform: scale3d(1, 1, 1)
        }

        .mytooltip:hover .tooltip-item2 {
            color: #ffffff;
            -webkit-transform: translate3d(0, -0.5em, 0);
            transform: translate3d(0, -0.5em, 0)
        }

        .mytooltip:hover .tooltip-content5 {
            opacity: 1;
            pointer-events: auto;
            transition-delay: 0s
        }

        .mytooltip:hover .tooltip-text3 {
            transition-delay: 0s;
            -webkit-transform: scale3d(1, 1, 1);
            transform: scale3d(1, 1, 1)
        }

        .mytooltip:hover .tooltip-inner2 {
            transition-delay: 0.3s;
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0)
        }

        .tooltip-item {
            background: rgba(0, 0, 0, 0.1);
            cursor: pointer;
            display: inline-block;
            font-weight: 500;
            padding: 0 10px
        }

        .tooltip-item:after {
            content: '';
            position: absolute;
            width: 360px;
            height: 20px;
            bottom: 100%;
            left: 50%;
            pointer-events: none;
            -webkit-transform: translateX(-50%);
            -ms-transform: translateX(-50%);
            transform: translateX(-50%)
        }

        .tooltip-content {
            position: absolute;
            z-index: 9999;
            width: 360px;
            left: 50%;
            margin: 0 0 20px -180px;
            bottom: 100%;
            text-align: left;
            font-size: 14px;
            line-height: 30px;
            box-shadow: -5px -5px 15px rgba(48, 54, 61, 0.2);
            background: #2b2b2b;
            opacity: 0;
            cursor: default;
            pointer-events: none
        }

        .tooltip-content img {
            position: relative;
            height: 140px;
            display: block;
            float: left;
            margin-right: 1em
        }

        .tooltip-effect-5 .tooltip-content {
            width: 180px;
            margin-left: -90px;
            -webkit-transform-origin: 50% calc(106%);
            -ms-transform-origin: 50% calc(106%);
            transform-origin: 50% calc(106%);
            -webkit-transform: rotate3d(0, 0, 1, 15deg);
            transform: rotate3d(0, 0, 1, 15deg);
            transition: opacity 0.2s, -webkit-transform 0.2s;
            transition: opacity 0.2s, transform 0.2s;
            transition: opacity 0.2s, transform 0.2s, -webkit-transform 0.2s;
            transition-timing-function: ease, cubic-bezier(0.17, 0.67, 0.4, 1.39)
        }

        .tooltip-effect-5 .tooltip-text {
            padding: 1.4em
        }

        .tooltip-content:after {
            content: '';
            top: 100%;
            left: 50%;
            border: solid transparent;
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
            border-color: transparent;
            border-top-color: #2a3035;
            border-width: 10px;
            margin-left: -10px
        }

        .tooltip-text {
            font-size: 14px;
            line-height: 24px;
            display: block;
            padding: 1.31em 1.21em 1.21em 0;
            color: #ffffff
        }

        .tooltip-content2 {
            position: absolute;
            z-index: 9999;
            width: 80px;
            height: 80px;
            padding-top: 25px;
            left: 50%;
            margin-left: -40px;
            bottom: 100%;
            border-radius: 50%;
            text-align: center;
            background: #009efb;
            color: #ffffff;
            opacity: 0;
            margin-bottom: 20px;
            cursor: default;
            pointer-events: none
        }

        .tooltip-content2 i {
            opacity: 0
        }

        .tooltip-effect-6 .tooltip-content2 {
            -webkit-transform: translate3d(0, 10px, 0) rotate3d(1, 1, 1, 45deg);
            transform: translate3d(0, 10px, 0) rotate3d(1, 1, 1, 45deg);
            -webkit-transform-origin: 50% 100%;
            -ms-transform-origin: 50% 100%;
            transform-origin: 50% 100%;
            transition: opacity 0.3s, -webkit-transform 0.3s;
            transition: opacity 0.3s, transform 0.3s;
            transition: opacity 0.3s, transform 0.3s, -webkit-transform 0.3s
        }

        .tooltip-effect-6 .tooltip-content2 i {
            -webkit-transform: scale3d(0, 0, 1);
            transform: scale3d(0, 0, 1);
            transition: opacity 0.3s, -webkit-transform 0.3s;
            transition: opacity 0.3s, transform 0.3s;
            transition: opacity 0.3s, transform 0.3s, -webkit-transform 0.3s
        }

        .tooltip-effect-6:hover .tooltip-content2 i {
            -webkit-transform: rotate3d(1, 1, 1, 0);
            transform: rotate3d(1, 1, 1, 0)
        }

        .tooltip-content2:after {
            content: '';
            position: absolute;
            top: 100%;
            left: 50%;
            margin: -7px 0 0 -15px;
            width: 30px;
            height: 20px;
            background: url(<?= base_url('vender/assets/images/tooltip/tooltip1.svg'); ?>) no-repeat center center;
            background-size: 100%
        }

        .tooltip-content3 {
            position: absolute;
            background: url(<?= base_url('vender/assets/images/tooltip/shape1.svg'); ?>) no-repeat center bottom;
            background-size: 100% 100%;
            z-index: 9999;
            width: 200px;
            bottom: 100%;
            left: 50%;
            margin-left: -100px;
            padding: 50px 30px;
            text-align: center;
            color: #ffffff;
            opacity: 0;
            cursor: default;
            font-size: 14px;
            line-height: 27px;
            pointer-events: none;
            -webkit-transform: scale3d(0.1, 0.2, 1);
            transform: scale3d(0.1, 0.2, 1);
            -webkit-transform-origin: 50% 120%;
            -ms-transform-origin: 50% 120%;
            transform-origin: 50% 120%;
            transition: opacity 0.4s, -webkit-transform 0.4s;
            transition: opacity 0.4s, transform 0.4s;
            transition: opacity 0.4s, transform 0.4s, -webkit-transform 0.4s;
            transition-timing-function: ease, cubic-bezier(0.6, 0, 0.4, 1)
        }

        .tooltip-content3:after {
            content: '';
            position: absolute;
            width: 16px;
            height: 16px;
            left: 50%;
            margin-left: -8px;
            top: 100%;
            background: #00aeef;
            -webkit-transform: translate3d(0, -60%, 0) rotate3d(0, 0, 1, 45deg);
            transform: translate3d(0, -60%, 0) rotate3d(0, 0, 1, 45deg)
        }

        .tooltip-item2 {
            color: #00aeef;
            cursor: pointer;
            z-index: 100;
            position: relative;
            display: inline-block;
            font-weight: 500;
            transition: background-color 0.3s, color 0.3s, -webkit-transform 0.3s;
            transition: background-color 0.3s, color 0.3s, transform 0.3s;
            transition: background-color 0.3s, color 0.3s, transform 0.3s, -webkit-transform 0.3s
        }

        .tooltip-content4 {
            position: absolute;
            z-index: 99;
            width: 360px;
            left: 50%;
            margin-left: -180px;
            bottom: -5px;
            text-align: left;
            background: #00aeef;
            opacity: 0;
            font-size: 14px;
            line-height: 27px;
            padding: 1.5em;
            color: #ffffff;
            border-bottom: 55px solid #2b2b2b;
            cursor: default;
            pointer-events: none;
            border-radius: 5px;
            -webkit-transform: translate3d(0, -0.5em, 0);
            transform: translate3d(0, -0.5em, 0);
            transition: opacity 0.3s, -webkit-transform 0.3s;
            transition: opacity 0.3s, transform 0.3s;
            transition: opacity 0.3s, transform 0.3s, -webkit-transform 0.3s
        }

        .tooltip-content4 a {
            color: #2b2b2b
        }

        .tooltip-text2 {
            opacity: 0;
            -webkit-transform: translate3d(0, 1.5em, 0);
            transform: translate3d(0, 1.5em, 0);
            transition: opacity 0.3s, -webkit-transform 0.3s;
            transition: opacity 0.3s, transform 0.3s;
            transition: opacity 0.3s, transform 0.3s, -webkit-transform 0.3s
        }

        .tooltip-content5 {
            position: absolute;
            z-index: 9999;
            width: 300px;
            left: 50%;
            bottom: 100%;
            font-size: 20px;
            line-height: 1.4;
            text-align: center;
            font-weight: 400;
            color: #ffffff;
            background: transparent;
            opacity: 0;
            margin: 0 0 20px -150px;
            cursor: default;
            pointer-events: none;
            transition: opacity 0.3s 0.3s
        }

        .tooltip-content5 span {
            display: block
        }

        .tooltip-text3 {
            border-bottom: 10px solid #009efb;
            overflow: hidden;
            -webkit-transform: scale3d(0, 1, 1);
            transform: scale3d(0, 1, 1);
            transition: -webkit-transform 0.3s 0.3s;
            transition: transform 0.3s 0.3s;
            transition: transform 0.3s 0.3s, -webkit-transform 0.3s 0.3s
        }

        .tooltip-inner2 {
            background: #2b2b2b;
            padding: 40px;
            -webkit-transform: translate3d(0, 100%, 0);
            transform: translate3d(0, 100%, 0);
            transition: -webkit-transform 0.3s;
            transition: transform 0.3s;
            transition: transform 0.3s, -webkit-transform 0.3s
        }

        .tooltip-content5:after {
            content: '';
            bottom: -20px;
            left: 50%;
            border: solid transparent;
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
            border-color: transparent;
            border-top-color: #009efb;
            border-width: 10px;
            margin-left: -10px
        }

        .tooltip-effect-1 .tooltip-content {
            -webkit-transform: translate3d(0, -10px, 0);
            transform: translate3d(0, -10px, 0);
            transition: opacity 0.3s, -webkit-transform 0.3s;
            transition: opacity 0.3s, transform 0.3s;
            transition: opacity 0.3s, transform 0.3s, -webkit-transform 0.3s;
            color: #ffffff
        }

        .tooltip-effect-2 .tooltip-content {
            -webkit-transform-origin: 50% calc(110%);
            -ms-transform-origin: 50% calc(110%);
            transform-origin: 50% calc(110%);
            -webkit-transform: perspective(1000px) rotate3d(1, 0, 0, 45deg);
            transform: perspective(1000px) rotate3d(1, 0, 0, 45deg);
            transition: opacity 0.2s, -webkit-transform 0.2s;
            transition: opacity 0.2s, transform 0.2s;
            transition: opacity 0.2s, transform 0.2s, -webkit-transform 0.2s
        }

        .tooltip-effect-3 .tooltip-content {
            -webkit-transform: translate3d(0, 10px, 0) rotate3d(1, 1, 0, 25deg);
            transform: translate3d(0, 10px, 0) rotate3d(1, 1, 0, 25deg);
            transition: opacity 0.3s, -webkit-transform 0.3s;
            transition: opacity 0.3s, transform 0.3s;
            transition: opacity 0.3s, transform 0.3s, -webkit-transform 0.3s
        }

        .tooltip-effect-4 .tooltip-content {
            -webkit-transform-origin: 50% 100%;
            -ms-transform-origin: 50% 100%;
            transform-origin: 50% 100%;
            -webkit-transform: scale3d(0.7, 0.3, 1);
            transform: scale3d(0.7, 0.3, 1);
            transition: opacity 0.2s, -webkit-transform 0.2s;
            transition: opacity 0.2s, transform 0.2s;
            transition: opacity 0.2s, transform 0.2s, -webkit-transform 0.2s
        }

        .tooltip.tooltip-effect-2:hover .tooltip-content {
            -webkit-transform: perspective(1000px) rotate3d(1, 0, 0, 0deg);
            transform: perspective(1000px) rotate3d(1, 0, 0, 0deg)
        }

        a.mytooltip {
            font-weight: 500;
            color: #009efb
        }

        .tooltip-effect-7 .tooltip-content2 {
            -webkit-transform: translate3d(0, 10px, 0);
            transform: translate3d(0, 10px, 0);
            transition: opacity 0.3s, -webkit-transform 0.3s;
            transition: opacity 0.3s, transform 0.3s;
            transition: opacity 0.3s, transform 0.3s, -webkit-transform 0.3s
        }

        .tooltip-effect-7 .tooltip-content2 i {
            -webkit-transform: translate3d(0, 15px, 0);
            transform: translate3d(0, 15px, 0);
            transition: opacity 0.3s, -webkit-transform 0.3s;
            transition: opacity 0.3s, transform 0.3s;
            transition: opacity 0.3s, transform 0.3s, -webkit-transform 0.3s
        }

        .tooltip-effect-8 .tooltip-content2 {
            -webkit-transform: translate3d(0, 10px, 0) rotate3d(0, 1, 0, 90deg);
            transform: translate3d(0, 10px, 0) rotate3d(0, 1, 0, 90deg);
            -webkit-transform-origin: 50% 100%;
            -ms-transform-origin: 50% 100%;
            transform-origin: 50% 100%;
            transition: opacity 0.3s, -webkit-transform 0.3s;
            transition: opacity 0.3s, transform 0.3s;
            transition: opacity 0.3s, transform 0.3s, -webkit-transform 0.3s
        }

        .tooltip-effect-8 .tooltip-content2 i {
            -webkit-transform: scale3d(0, 0, 1);
            transform: scale3d(0, 0, 1);
            transition: opacity 0.3s, -webkit-transform 0.3s;
            transition: opacity 0.3s, transform 0.3s;
            transition: opacity 0.3s, transform 0.3s, -webkit-transform 0.3s
        }

        .tooltip-effect-9 .tooltip-content2 {
            -webkit-transform: translate3d(0, -20px, 0);
            transform: translate3d(0, -20px, 0);
            transition: opacity 0.3s, -webkit-transform 0.3s;
            transition: opacity 0.3s, transform 0.3s;
            transition: opacity 0.3s, transform 0.3s, -webkit-transform 0.3s
        }

        .tooltip-effect-9 .tooltip-content2 i {
            -webkit-transform: translate3d(0, 20px, 0);
            transform: translate3d(0, 20px, 0);
            transition: opacity 0.3s, -webkit-transform 0.3s;
            transition: opacity 0.3s, transform 0.3s;
            transition: opacity 0.3s, transform 0.3s, -webkit-transform 0.3s
        }

        .error-box {
            height: 100%;
            position: fixed;
            background: url(<?= base_url('vender/assets/images/background/error-bg.jpg') ?>) no-repeat center center #fff !important;
            width: 100%
        }

        .error-box .footer {
            width: 100%;
            left: 0px;
            right: 0px
        }

        .error-body {
            padding-top: 5%
        }

        .error-body h1 {
            font-size: 210px;
            font-weight: 900;
            line-height: 210px
        }

        .gmaps, .gmaps-panaroma {
            height: 300px
        }

        .gmaps, .gmaps-panaroma {
            height: 300px;
            background: #f2f7f8;
            border-radius: 3px
        }

        .gmaps-overlay {
            display: block;
            text-align: center;
            color: #ffffff;
            font-size: 16px;
            line-height: 40px;
            background: #7460ee;
            border-radius: 4px;
            padding: 10px 20px
        }

        .gmaps-overlay_arrow {
            left: 50%;
            margin-left: -16px;
            width: 0;
            height: 0;
            position: absolute
        }

        .gmaps-overlay_arrow.above {
            bottom: -15px;
            border-left: 16px solid transparent;
            border-right: 16px solid transparent;
            border-top: 16px solid #7460ee
        }

        .gmaps-overlay_arrow.below {
            top: -15px;
            border-left: 16px solid transparent;
            border-right: 16px solid transparent;
            border-bottom: 16px solid #7460ee
        }

        .jvectormap-zoomin, .jvectormap-zoomout {
            width: 10px;
            height: 10px;
            line-height: 10px
        }

        .jvectormap-zoomout {
            top: 40px
        }

        .search-listing {
            padding: 0px;
            margin: 0px
        }

        .search-listing li {
            list-style: none;
            padding: 15px 0;
            border-bottom: 1px solid rgba(120, 130, 140, 0.13)
        }

        .search-listing li h3 {
            margin: 0px;
            font-size: 18px
        }

        .search-listing li h3 a {
            color: #009efb
        }

        .search-listing li h3 a:hover {
            text-decoration: underline
        }

        .search-listing li a {
            color: #55ce63
        }

        .login-register {
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            height: 100%;
            width: 100%;
            padding: 10% 0;
            position: fixed
        }

        .login-box {
            width: 400px;
            margin: 0 auto
        }

        .login-box .footer {
            width: 100%;
            left: 0px;
            right: 0px
        }

        .login-box .social {
            display: block;
            margin-bottom: 30px
        }

        #recoverform {
            display: none
        }

        .login-sidebar {
            padding: 0px;
            margin-top: 0px
        }

        .login-sidebar .login-box {
            right: 0px;
            position: absolute;
            height: 100%
        }

        .minimal-faq .card {
            border: 0px
        }

        .minimal-faq .card .card-header {
            background: #ffffff;
            padding: 20px 0;
            margin-top: 10px
        }

        .minimal-faq .card .card-block {
            padding: 15px 0px
        }

        .pricing-box {
            position: relative;
            text-align: center;
            margin-top: 30px
        }

        .featured-plan {
            margin-top: 0px
        }

        .featured-plan .pricing-body {
            padding: 60px 0;
            background: #ebf3f5;
            border: 1px solid #ddd
        }

        .featured-plan .price-table-content .price-row {
            border-top: 1px solid rgba(120, 130, 140, 0.13)
        }

        .pricing-body {
            border-radius: 0px;
            border-top: 1px solid rgba(120, 130, 140, 0.13);
            border-bottom: 5px solid rgba(120, 130, 140, 0.13);
            vertical-align: middle;
            padding: 30px 0;
            position: relative
        }

        .pricing-body h2 {
            position: relative;
            font-size: 56px;
            margin: 20px 0 10px;
            font-weight: 500
        }

        .pricing-body h2 span {
            position: absolute;
            font-size: 15px;
            top: -10px;
            margin-left: -10px
        }

        .price-table-content .price-row {
            padding: 20px 0;
            border-top: 1px solid rgba(120, 130, 140, 0.13)
        }

        .pricing-plan {
            padding: 0 15px
        }

        .pricing-plan .no-padding {
            padding: 0px
        }

        .price-lable {
            position: absolute;
            top: -10px;
            padding: 5px 10px;
            margin: 0 auto;
            display: inline-block;
            width: 100px;
            left: 0px;
            right: 0px
        }

        .chat-main-box {
            position: relative;
            overflow: hidden
        }

        .chat-main-box .chat-left-aside {
            position: relative;
            width: 250px;
            float: left;
            z-index: 9;
            top: 0px;
            border-right: 1px solid rgba(120, 130, 140, 0.13)
        }

        .chat-main-box .chat-left-aside .open-panel {
            display: none;
            cursor: pointer;
            position: absolute;
            left: -webkit-calc(100% - 1px);
            top: 50%;
            z-index: 100;
            background-color: #fff;
            -webkit-box-shadow: 1px 0 3px rgba(0, 0, 0, 0.2);
            box-shadow: 1px 0 3px rgba(0, 0, 0, 0.2);
            border-radius: 0 100px 100px 0;
            line-height: 1;
            padding: 15px 8px 15px 4px
        }

        .chat-main-box .chat-left-aside .chat-left-inner {
            position: relative
        }

        .chat-main-box .chat-left-aside .chat-left-inner .form-control {
            height: 60px
        }

        .chat-main-box .chat-left-aside .chat-left-inner .style-none {
            padding: 0px
        }

        .chat-main-box .chat-left-aside .chat-left-inner .style-none li {
            list-style: none;
            overflow: hidden
        }

        .chat-main-box .chat-left-aside .chat-left-inner .style-none li a {
            padding: 20px
        }

        .chat-main-box .chat-left-aside .chat-left-inner .style-none li a.active, .chat-main-box .chat-left-aside .chat-left-inner .style-none li a:hover {
            background: #ebf3f5
        }

        .chat-main-box .chat-right-aside {
            width: calc(100% - 250px);
            float: left
        }

        .chat-main-box .chat-right-aside .chat-list {
            max-height: none;
            height: 100%;
            padding-top: 40px
        }

        .chat-main-box .chat-right-aside .chat-list .chat-text {
            border-radius: 6px
        }

        .chat-main-box .chat-right-aside .send-chat-box {
            position: relative
        }

        .chat-main-box .chat-right-aside .send-chat-box .form-control {
            border: none;
            border-top: 1px solid rgba(120, 130, 140, 0.13);
            resize: none;
            height: 80px;
            padding-right: 180px
        }

        .chat-main-box .chat-right-aside .send-chat-box .form-control:focus {
            border-color: rgba(120, 130, 140, 0.13)
        }

        .chat-main-box .chat-right-aside .send-chat-box .custom-send {
            position: absolute;
            right: 20px;
            bottom: 10px
        }

        .chat-main-box .chat-right-aside .send-chat-box .custom-send .cst-icon {
            color: #54667a;
            margin-right: 10px
        }

        .inbox-panel .list-group .list-group-item {
            border: 0px;
            border-radius: 0px;
            border-left: 3px solid transparent
        }

        .inbox-panel .list-group .list-group-item a {
            color: #54667a
        }

        .inbox-panel .list-group .list-group-item.active, .inbox-panel .list-group .list-group-item:hover {
            background: #f2f7f8;
            border-left: 3px solid #009efb
        }

        .inbox-center .unread td {
            font-weight: 400
        }

        .inbox-center td {
            vertical-align: middle;
            white-space: nowrap
        }

        .inbox-center a {
            color: #54667a;
            padding: 2px 0 3px 0;
            overflow: hidden;
            vertical-align: middle;
            text-overflow: ellipsis;
            white-space: nowrap;
            display: inline-block
        }

        .inbox-center .checkbox {
            margin-top: -13px;
            height: 20px
        }

        .contact-page-aside {
            position: relative
        }

        .left-aside {
            position: absolute;
            border-right: 1px solid rgba(120, 130, 140, 0.13);
            padding: 20px;
            width: 250px;
            height: 100%
        }

        .right-aside {
            padding: 20px;
            margin-left: 250px
        }

        .contact-list td {
            vertical-align: middle;
            padding: 25px 10px
        }

        .contact-list td img {
            width: 30px
        }

        .list-style-none {
            margin: 0px;
            padding: 0px
        }

        .list-style-none li {
            list-style: none;
            margin: 0px
        }

        .list-style-none li.box-label a {
            font-weight: 500
        }

        .list-style-none li.divider {
            margin: 10px 0;
            height: 1px;
            background: rgba(120, 130, 140, 0.13)
        }

        .list-style-none li a {
            padding: 15px 10px;
            display: block;
            color: #54667a
        }

        .list-style-none li a:hover {
            color: #009efb
        }

        .list-style-none li a span {
            float: right
        }

        .slimScrollBar {
            z-index: 10 !important
        }

        .left-sidebar {
            position: absolute;
            width: 240px;
            height: 100%;
            top: 0px;
            z-index: 20;
            padding-top: 70px;
            background: #fff
        }

        .left-sidebar {
            position: fixed
        }

        .user-profile {
            text-align: center;
            position: relative
        }

        .user-profile .profile-img {
            width: 50px;
            margin: 0 auto;
            border-radius: 100%
        }

        .user-profile .profile-img:before {
            -webkit-animation: 2.5s blow 0s linear infinite;
            animation: 2.5s blow 0s linear infinite;
            position: absolute;
            content: '';
            width: 50px;
            height: 50px;
            top: 0;
            margin: 0 auto;
            border-radius: 50%;
            z-index: 0
        }

        @-webkit-keyframes blow {
            0% {
                box-shadow: 0 0 0 0px rgba(0, 0, 0, 0.1);
                opacity: 1;
                -webkit-transform: scale3d(1, 1, 0.5);
                transform: scale3d(1, 1, 0.5)
            }
            50% {
                box-shadow: 0 0 0 10px rgba(0, 0, 0, 0.1);
                opacity: 1;
                -webkit-transform: scale3d(1, 1, 0.5);
                transform: scale3d(1, 1, 0.5)
            }
            to {
                box-shadow: 0 0 0 20px rgba(0, 0, 0, 0.1);
                opacity: 0;
                -webkit-transform: scale3d(1, 1, 0.5);
                transform: scale3d(1, 1, 0.5)
            }
        }

        @keyframes blow {
            0% {
                box-shadow: 0 0 0 0px rgba(0, 0, 0, 0.1);
                opacity: 1;
                -webkit-transform: scale3d(1, 1, 0.5);
                transform: scale3d(1, 1, 0.5)
            }
            50% {
                box-shadow: 0 0 0 10px rgba(0, 0, 0, 0.1);
                opacity: 1;
                -webkit-transform: scale3d(1, 1, 0.5);
                transform: scale3d(1, 1, 0.5)
            }
            to {
                box-shadow: 0 0 0 20px rgba(0, 0, 0, 0.1);
                opacity: 0;
                -webkit-transform: scale3d(1, 1, 0.5);
                transform: scale3d(1, 1, 0.5)
            }
        }

        .user-profile .profile-img img {
            width: 100%;
            border-radius: 100%
        }

        .user-profile .profile-text {
            padding: 5px 0;
            position: relative
        }

        .user-profile .profile-text a {
            color: #54667a
        }

        .user-profile .dropdown-menu {
            left: 0px;
            right: 0px;
            width: 180px;
            margin: 0 auto
        }

        .sidebar-footer {
            position: fixed;
            bottom: 0px;
            left: 0px;
            transition: 0.2s ease-out;
            width: 240px;
            background: #e8eff0;
            border-top: 1px solid rgba(120, 130, 140, 0.13)
        }

        .sidebar-footer a {
            padding: 15px;
            width: 33.333337%;
            float: left;
            text-align: center;
            font-size: 18px
        }

        .scroll-sidebar {
            padding-bottom: 60px;
            padding-top: 30px
        }

        .collapse.in {
            display: block
        }

        .sidebar-nav {
            background: #fff
        }

        .sidebar-nav ul {
            margin: 0px;
            padding: 0px
        }

        .sidebar-nav ul li {
            list-style: none
        }

        .sidebar-nav ul li a {
            color: #54667a;
            padding: 14px 35px 14px 15px;
            display: block;
            font-size: 15px;
            white-space: nowrap
        }

        .sidebar-nav ul li a.active, .sidebar-nav ul li a:hover {
            color: #009efb
        }

        .sidebar-nav ul li a.active {
            font-weight: 400;
            color: #263238
        }

        .sidebar-nav ul li ul {
            padding-left: 30px
        }

        .sidebar-nav ul li ul li a {
            padding: 10px 35px 10px 15px
        }

        .sidebar-nav ul li ul ul {
            padding-left: 20px
        }

        .sidebar-nav ul li.nav-small-cap {
            font-size: 12px;
            padding: 14px 14px 14px 20px;
            color: #90a4ae;
            font-weight: 500
        }

        .sidebar-nav ul li.nav-devider {
            height: 1px;
            background: rgba(120, 130, 140, 0.13);
            display: block;
            margin: 20px 0
        }

        .sidebar-nav > ul > li.active > a {
            border-left: 3px solid #009efb;
            color: #009efb
        }

        .sidebar-nav > ul > li.active > a i {
            color: #009efb
        }

        .sidebar-nav > ul > li > a {
            border-left: 3px solid #fff
        }

        .sidebar-nav > ul > li > a.active, .sidebar-nav > ul > li > a:hover {
            border-left: 3px solid #009efb
        }

        .sidebar-nav > ul > li > a.active i, .sidebar-nav > ul > li > a:hover i {
            color: #009efb
        }

        .sidebar-nav > ul > li > a i {
            width: 27px;
            font-size: 21px;
            display: inline-block;
            vertical-align: middle;
            color: #a6b7bf
        }

        .sidebar-nav > ul > li > a .label {
            float: right;
            margin-top: 6px
        }

        .sidebar-nav > ul > li > a.active {
            font-weight: 400;
            background: #ffffff;
            color: #009efb
        }

        .sidebar-nav .has-arrow {
            position: relative
        }

        .sidebar-nav .has-arrow:after {
            position: absolute;
            content: '';
            width: .4em;
            height: .4em;
            border-width: 1px 0 0 1px;
            border-style: solid;
            border-color: #54667a;
            right: 1em;
            -webkit-transform: rotate(-45deg) translate(0, -50%);
            -ms-transform: rotate(-45deg) translate(0, -50%);
            -o-transform: rotate(-45deg) translate(0, -50%);
            transform: rotate(-45deg) translate(0, -50%);
            -webkit-transform-origin: top;
            -ms-transform-origin: top;
            -o-transform-origin: top;
            transform-origin: top;
            top: 50%;
            -webkit-transition: all .3s ease-out;
            -o-transition: all .3s ease-out;
            transition: all .3s ease-out
        }

        .sidebar-nav .active > .has-arrow:after, .sidebar-nav .has-arrow[aria-expanded=true]:after, .sidebar-nav li > .has-arrow.active:after {
            -webkit-transform: rotate(-135deg) translate(0, -50%);
            -ms-transform: rotate(-135deg) translate(0, -50%);
            -o-transform: rotate(-135deg) translate(0, -50%);
            transform: rotate(-135deg) translate(0, -50%)
        }

        @media (min-width: 768px) {
            .mini-sidebar .sidebar-nav #sidebarnav li {
                position: relative
            }

            .mini-sidebar .sidebar-nav #sidebarnav > li > ul {
                position: absolute;
                left: 60px;
                top: 59px;
                width: 200px;
                z-index: 1001;
                background: #e8eff0;
                display: none;
                padding-left: 1px
            }

            .mini-sidebar .sidebar-nav #sidebarnav > li:hover > ul {
                height: auto !important;
                overflow: auto
            }

            .mini-sidebar .sidebar-nav #sidebarnav > li:hover > ul, .mini-sidebar .sidebar-nav #sidebarnav > li:hover > ul.collapse {
                display: block
            }

            .mini-sidebar .sidebar-nav #sidebarnav > li > a.has-arrow:after {
                display: none
            }

            /*.left-sidebar {*/
            /*    width: 60px*/
            /*}*/

            .mini-sidebar .user-profile {
                padding-bottom: 30px;
                width: 60px
            }

            .mini-sidebar .scroll-sidebar {
                padding-bottom: 0px;
                position: absolute
            }

            .mini-sidebar .hide-menu, .mini-sidebar .nav-small-cap, .mini-sidebar .sidebar-footer, .mini-sidebar .user-profile .profile-text {
                display: none
            }

            .mini-sidebar .nav-devider {
                width: 60px
            }

            .mini-sidebar .sidebar-nav {
                background: transparent
            }

            .mini-sidebar .sidebar-nav #sidebarnav > li > a {
                padding: 14px 15px;
                width: 60px
            }

            .mini-sidebar .sidebar-nav #sidebarnav > li:hover > a {
                width: 260px;
                background: #009efb;
                color: #ffffff;
                border-color: #009efb
            }

            .mini-sidebar .sidebar-nav #sidebarnav > li:hover > a i {
                color: #ffffff
            }

            .mini-sidebar .sidebar-nav #sidebarnav > li:hover > a .hide-menu {
                display: inline
            }

            .mini-sidebar .sidebar-nav #sidebarnav > li.active > a {
                border-color: transparent
            }

            .mini-sidebar .sidebar-nav #sidebarnav > li.active > a.active {
                border-color: #009efb
            }
        }

        .left-sidebar {
            position: fixed
        }

        .left-sidebar, .sidebar-footer {
            left: -240px
        }

        .show-sidebar .left-sidebar, .show-sidebar .sidebar-footer {
            left: 0px
        }

        .topbar .top-navbar .mailbox {
            width: 300px
        }

        .topbar .top-navbar .mailbox ul {
            padding: 0px
        }

        .topbar .top-navbar .mailbox ul li {
            list-style: none
        }

        .mailbox ul li .drop-title {
            font-weight: 500;
            padding: 11px 20px 15px;
            border-bottom: 1px solid rgba(120, 130, 140, 0.13)
        }

        .mailbox ul li .nav-link {
            border-top: 1px solid rgba(120, 130, 140, 0.13);
            padding-top: 15px
        }

        .mailbox .message-center {
            height: 200px;
            overflow: auto;
            position: relative
        }

        .mailbox .message-center a {
            border-bottom: 1px solid rgba(120, 130, 140, 0.13);
            display: block;
            text-decoration: none;
            padding: 9px 15px
        }

        .mailbox .message-center a:hover {
            background: #f2f7f8
        }

        .mailbox .message-center a div {
            white-space: normal
        }

        .mailbox .message-center a .user-img {
            width: 40px;
            position: relative;
            display: inline-block;
            margin: 0 10px 15px 0
        }

        .mailbox .message-center a .user-img img {
            width: 100%
        }

        .mailbox .message-center a .user-img .profile-status {
            border: 2px solid #ffffff;
            border-radius: 50%;
            display: inline-block;
            height: 10px;
            left: 30px;
            position: absolute;
            top: 1px;
            width: 10px
        }

        .mailbox .message-center a .user-img .online {
            background: #55ce63
        }

        .mailbox .message-center a .user-img .busy {
            background: #f62d51
        }

        .mailbox .message-center a .user-img .away {
            background: #ffbc34
        }

        .mailbox .message-center a .user-img .offline {
            background: #ffbc34
        }

        .mailbox .message-center a .mail-contnet {
            display: inline-block;
            width: 75%;
            vertical-align: middle
        }

        .mailbox .message-center a .mail-contnet h5 {
            margin: 5px 0px 0
        }

        .mailbox .message-center a .mail-contnet .mail-desc, .mailbox .message-center a .mail-contnet .time {
            font-size: 12px;
            display: block;
            margin: 1px 0;
            text-overflow: ellipsis;
            overflow: hidden;
            color: #54667a;
            white-space: nowrap
        }

        .analytics-info li span {
            font-size: 24px;
            vertical-align: middle
        }

        .stats-row {
            margin-bottom: 20px
        }

        .stats-row .stat-item {
            display: inline-block;
            padding-right: 15px
        }

        .stats-row .stat-item + .stat-item {
            padding-left: 15px;
            border-left: 1px solid rgba(120, 130, 140, 0.13)
        }

        .city-weather-days {
            margin: 0px
        }

        .city-weather-days li {
            text-align: center;
            padding: 15px 0
        }

        .city-weather-days li span {
            display: block;
            padding: 10px 0 0;
            color: #90a4ae
        }

        .city-weather-days li i {
            display: block;
            font-size: 20px;
            color: #009efb
        }

        .city-weather-days li h3 {
            font-weight: 300;
            margin-top: 5px
        }

        .comment-widgets {
            position: relative;
            margin-bottom: 10px
        }

        .comment-widgets .comment-row {
            border-left: 3px solid #ffffff;
            padding: 15px
        }

        .comment-widgets .comment-row.active, .comment-widgets .comment-row:hover {
            border-color: #009efb
        }

        .comment-text {
            padding: 15px 15px 15px 20px
        }

        .comment-text.active .comment-footer .action-icons, .comment-text:hover .comment-footer .action-icons {
            visibility: visible
        }

        .comment-text p {
            max-height: 50px;
            overflow: hidden
        }

        .comment-footer .action-icons {
            visibility: hidden
        }

        .comment-footer .action-icons a {
            padding-left: 15px;
            vertical-align: middle;
            color: #90a4ae
        }

        .comment-footer .action-icons a.active, .comment-footer .action-icons a:hover {
            color: #009efb
        }

        .todo-list li {
            border: 0px;
            margin-bottom: 0px;
            padding: 20px 15px 15px 0px
        }

        .todo-list li .checkbox {
            width: 100%
        }

        .todo-list li .checkbox label {
            font-weight: 400
        }

        .todo-list li:last-child {
            border-bottom: 0px
        }

        .todo-list li .assignedto {
            padding: 0px 0 0 27px;
            margin: 0px
        }

        .todo-list li .assignedto li {
            list-style: none;
            padding: 0px;
            display: inline-block;
            border: 0px;
            margin-right: 2px
        }

        .todo-list li .assignedto li img {
            width: 30px;
            border-radius: 100%
        }

        .todo-list li .item-date {
            padding-left: 25px;
            font-size: 12px;
            display: inline-block
        }

        .list-task .task-done span {
            text-decoration: line-through
        }

        .chat-list {
            margin: 0px;
            padding: 0px
        }

        .chat-list li {
            list-style: none;
            margin-top: 30px
        }

        .chat-list li .chat-img {
            display: inline-block;
            width: 45px;
            vertical-align: top
        }

        .chat-list li .chat-img img {
            width: 45px;
            border-radius: 100%
        }

        .chat-list li .chat-content {
            width: calc(100% - 140px);
            display: inline-block;
            padding-left: 15px
        }

        .chat-list li .chat-content h5 {
            color: #90a4ae
        }

        .chat-list li .chat-content .box {
            display: inline-block;
            margin-bottom: 10px
        }

        .chat-list li .chat-time {
            display: inline-block;
            text-align: right;
            width: 80px;
            font-size: 13px;
            color: #90a4ae
        }

        .chat-list li.odd .chat-content {
            text-align: right;
            width: calc(100% - 90px)
        }

        .chat-list li.odd .box {
            clear: both
        }

        .chat-list li.odd + .odd {
            margin-top: 0px
        }

        .chat-list li.reverse {
            text-align: right
        }

        .chat-list li.reverse .chat-time {
            text-align: left
        }

        .chat-list li.reverse .chat-content {
            padding-left: 0px;
            padding-right: 15px
        }

        .message-box ul li .drop-title {
            font-weight: 500;
            padding: 11px 20px 15px;
            border-bottom: 1px solid rgba(120, 130, 140, 0.13)
        }

        .message-box ul li .nav-link {
            border-top: 1px solid rgba(120, 130, 140, 0.13);
            padding-top: 15px
        }

        .message-box .message-widget {
            position: relative
        }

        .message-box .message-widget a {
            border-bottom: 1px solid rgba(120, 130, 140, 0.13);
            display: block;
            text-decoration: none;
            padding: 9px 15px
        }

        .message-box .message-widget a:hover {
            background: #f2f7f8
        }

        .message-box .message-widget a:last-child {
            border-bottom: 0px
        }

        .message-box .message-widget a div {
            white-space: normal
        }

        .message-box .message-widget a .user-img {
            width: 45px;
            position: relative;
            display: inline-block;
            margin: 0 10px 15px 0
        }

        .message-box .message-widget a .user-img img {
            width: 100%
        }

        .message-box .message-widget a .user-img .profile-status {
            border: 2px solid #ffffff;
            border-radius: 50%;
            display: inline-block;
            height: 10px;
            left: 33px;
            position: absolute;
            top: -1px;
            width: 10px
        }

        .message-box .message-widget a .user-img .online {
            background: #55ce63
        }

        .message-box .message-widget a .user-img .busy {
            background: #f62d51
        }

        .message-box .message-widget a .user-img .away {
            background: #ffbc34
        }

        .message-box .message-widget a .user-img .offline {
            background: #ffbc34
        }

        .message-box .message-widget a .mail-contnet {
            display: inline-block;
            width: 75%;
            vertical-align: middle
        }

        .message-box .message-widget a .mail-contnet h5 {
            margin: 5px 0px 0
        }

        .message-box .message-widget a .mail-contnet .mail-desc, .message-box .message-widget a .mail-contnet .time {
            font-size: 12px;
            display: block;
            margin: 1px 0;
            text-overflow: ellipsis;
            overflow: hidden;
            color: #54667a;
            white-space: nowrap
        }

        .calendar {
            float: left;
            margin-bottom: 0px
        }

        .fc-view {
            margin-top: 30px
        }

        .none-border .modal-footer {
            border-top: none
        }

        .fc-toolbar {
            margin-bottom: 5px;
            margin-top: 15px
        }

        .fc-toolbar h2 {
            font-size: 18px;
            font-weight: 500;
            line-height: 30px;
            text-transform: uppercase
        }

        .fc-day {
            background: #ffffff
        }

        .fc-toolbar .fc-state-active, .fc-toolbar .ui-state-active, .fc-toolbar .ui-state-hover, .fc-toolbar button:focus, .fc-toolbar button:hover {
            z-index: 0
        }

        .fc-widget-header {
            border: 0px !important
        }

        .fc-widget-content {
            border-color: rgba(120, 130, 140, 0.13) !important
        }

        .fc th.fc-widget-header {
            color: #54667a;
            font-size: 13px;
            font-weight: 300;
            line-height: 20px;
            padding: 7px 0px;
            text-transform: uppercase
        }

        .fc th.fc-sat, .fc th.fc-sun, .fc th.fc-thu, .fc th.fc-tue {
            background: #f2f7f8
        }

        .fc th.fc-fri, .fc th.fc-mon, .fc th.fc-wed {
            background: #f2f7f8
        }

        .fc-view {
            margin-top: 0px
        }

        .fc-toolbar {
            margin: 0px;
            padding: 24px 0px
        }

        .fc-button {
            background: #ffffff;
            border: 1px solid rgba(120, 130, 140, 0.13);
            color: #54667a;
            text-transform: capitalize
        }

        .fc-button:hover {
            background: #f2f7f8;
            opacity: 0.8
        }

        .fc-text-arrow {
            font-family: inherit;
            font-size: 16px
        }

        .fc-state-hover {
            background: #F5F5F5
        }

        .fc-unthemed .fc-today {
            border: 1px solid #f62d51;
            background: #f2f7f8 !important
        }

        .fc-state-highlight {
            background: #f0f0f0
        }

        .fc-cell-overlay {
            background: #f0f0f0
        }

        .fc-unthemed .fc-today {
            background: #ffffff
        }

        .fc-event {
            border-radius: 0px;
            border: none;
            cursor: move;
            color: #ffffff !important;
            font-size: 13px;
            margin: 1px -1px 0 -1px;
            padding: 5px 5px;
            text-align: center;
            background: #009efb
        }

        .calendar-event {
            cursor: move;
            margin: 10px 5px 0 0;
            padding: 6px 10px;
            display: inline-block;
            color: #ffffff;
            min-width: 140px;
            text-align: center;
            background: #009efb
        }

        .calendar-event a {
            float: right;
            opacity: 0.6;
            font-size: 10px;
            margin: 4px 0 0 10px;
            color: #ffffff
        }

        .fc-basic-view td.fc-week-number span {
            padding-right: 5px
        }

        .fc-basic-view .fc-day-number {
            padding: 10px 15px;
            display: inline-block
        }

        .steamline {
            position: relative;
            border-left: 1px solid rgba(120, 130, 140, 0.13);
            margin-left: 20px
        }

        .steamline .sl-left {
            float: left;
            margin-left: -20px;
            z-index: 1;
            width: 40px;
            line-height: 40px;
            text-align: center;
            height: 40px;
            border-radius: 100%;
            color: #ffffff;
            background: #263238;
            margin-right: 15px
        }

        .steamline .sl-left img {
            max-width: 40px
        }

        .steamline .sl-right {
            padding-left: 50px
        }

        .steamline .sl-right .desc, .steamline .sl-right .inline-photos {
            margin-bottom: 30px
        }

        .steamline .sl-item {
            border-bottom: 1px solid rgba(120, 130, 140, 0.13);
            margin: 20px 0
        }

        .sl-date {
            font-size: 10px;
            color: #90a4ae
        }

        .time-item {
            border-color: rgba(120, 130, 140, 0.13);
            padding-bottom: 1px;
            position: relative
        }

        .time-item:before {
            content: " ";
            display: table
        }

        .time-item:after {
            background-color: #ffffff;
            border-color: rgba(120, 130, 140, 0.13);
            border-radius: 10px;
            border-style: solid;
            border-width: 2px;
            bottom: 0;
            content: '';
            height: 14px;
            left: 0;
            margin-left: -8px;
            position: absolute;
            top: 5px;
            width: 14px
        }

        .time-item-item:after {
            content: " ";
            display: table
        }

        .item-info {
            margin-bottom: 15px;
            margin-left: 15px
        }

        .item-info p {
            margin-bottom: 10px !important
        }

        .feeds {
            margin: 0px;
            padding: 0px
        }

        .feeds li {
            list-style: none;
            padding: 10px;
            display: block
        }

        .feeds li:hover {
            background: #ebf3f5
        }

        .feeds li > div {
            width: 40px;
            height: 40px;
            margin-right: 5px;
            display: inline-block;
            text-align: center;
            vertical-align: middle;
            border-radius: 100%
        }

        .feeds li > div i {
            line-height: 40px
        }

        .feeds li span {
            float: right;
            width: auto;
            font-size: 12px
        }

        .vert .carousel-item-next.carousel-item-left, .vert .carousel-item-prev.carousel-item-right {
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0)
        }

        .vert .active.carousel-item-right, .vert .carousel-item-next {
            -webkit-transform: translate3d(0, 100%, 0);
            transform: translate3d(0, 100%, 0)
        }

        .vert .active.carousel-item-left, .vert .carousel-item-prev {
            -webkit-transform: translate3d(0, -100%, 0);
            transform: translate3d(0, -100%, 0)
        }

        .social-widget .soc-header {
            padding: 15px;
            text-align: center;
            font-size: 36px;
            color: #fff
        }

        .social-widget .soc-header.box-facebook {
            background: #3b5998
        }

        .social-widget .soc-header.box-twitter {
            background: #00aced
        }

        .social-widget .soc-header.box-google {
            background: #f86c6b
        }

        .social-widget .soc-header.box-linkedin {
            background: #4875b4
        }

        .social-widget .soc-content {
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            text-align: center
        }

        .social-widget .soc-content div {
            padding: 10px
        }

        .social-widget .soc-content div h3 {
            margin-bottom: 0px
        }

        .gaugejs-box {
            position: relative;
            margin: 0 auto
        }

        .gaugejs-box canvas.gaugejs {
            width: 100% !important;
            height: auto !important
        }

        .social-profile-first {
            text-align: center;
            padding-top: 22%;
            margin-bottom: 96px
        }

        .social-profile-first.bg-over {
            background: rgba(56, 83, 161, 0.7)
        }

        .social-profile-first .middle {
            vertical-align: middle
        }

        .country-state {
            list-style: none;
            margin: 0;
            padding: 0 0 0 10px
        }

        .country-state li {
            margin-top: 30px;
            margin-bottom: 10px
        }

        .country-state h2 {
            margin-bottom: 0px;
            font-weight: 400
        }

        .profiletimeline {
            position: relative;
            margin-left: 70px;
            margin-right: 10px
        }

        .profiletimeline .sl-left {
            float: left;
            margin-left: -60px;
            z-index: 1;
            margin-right: 15px
        }

        .profiletimeline .sl-left img {
            max-width: 40px
        }

        .profiletimeline .sl-item {
            margin-top: 8px;
            margin-bottom: 30px
        }

        .profiletimeline .sl-date {
            font-size: 12px;
            color: #90a4ae
        }

        .profiletimeline .time-item {
            border-color: rgba(120, 130, 140, 0.13);
            padding-bottom: 1px;
            position: relative
        }

        .profiletimeline .time-item:before {
            content: " ";
            display: table
        }

        .profiletimeline .time-item:after {
            background-color: #ffffff;
            border-color: rgba(120, 130, 140, 0.13);
            border-radius: 10px;
            border-style: solid;
            border-width: 2px;
            bottom: 0;
            content: '';
            height: 14px;
            left: 0;
            margin-left: -8px;
            position: absolute;
            top: 5px;
            width: 14px
        }

        .profiletimeline .time-item-item:after {
            content: " ";
            display: table
        }

        .profiletimeline .item-info {
            margin-bottom: 15px;
            margin-left: 15px
        }

        .profiletimeline .item-info p {
            margin-bottom: 10px !important
        }

        @media (min-width: 1600px) {
            .col-xlg-1, .col-xlg-2, .col-xlg-3, .col-xlg-4, .col-xlg-5, .col-xlg-6, .col-xlg-7, .col-xlg-8, .col-xlg-9, .col-xlg-10, .col-xlg-11, .col-xlg-12 {
                float: left
            }

            .col-xlg-12 {
                -webkit-box-flex: 0;
                -webkit-flex: 0 0 100%;
                -ms-flex: 0 0 100%;
                flex: 0 0 100%;
                max-width: 100%
            }

            .col-xlg-11 {
                -webkit-box-flex: 0;
                -webkit-flex: 0 0 91.66666667%;
                -ms-flex: 0 0 91.66666667%;
                flex: 0 0 91.66666667%;
                max-width: 91.66666667%
            }

            .col-xlg-10 {
                -webkit-box-flex: 0;
                -webkit-flex: 0 0 83.33333333%;
                -ms-flex: 0 0 83.33333333%;
                flex: 0 0 83.33333333%;
                max-width: 83.33333333%
            }

            .col-xlg-9 {
                -webkit-box-flex: 0;
                -webkit-flex: 0 0 75%;
                -ms-flex: 0 0 75%;
                flex: 0 0 75%;
                max-width: 75%
            }

            .col-xlg-8 {
                -webkit-box-flex: 0;
                -webkit-flex: 0 0 66.66666667%;
                -ms-flex: 0 0 66.66666667%;
                flex: 0 0 66.66666667%;
                max-width: 66.66666667%
            }

            .col-xlg-7 {
                -webkit-box-flex: 0;
                -webkit-flex: 0 0 58.33333333%;
                -ms-flex: 0 0 58.33333333%;
                flex: 0 0 58.33333333%;
                max-width: 58.33333333%
            }

            .col-xlg-6 {
                -webkit-box-flex: 0;
                -webkit-flex: 0 0 50%;
                -ms-flex: 0 0 50%;
                flex: 0 0 50%;
                max-width: 50%
            }

            .col-xlg-5 {
                -webkit-box-flex: 0;
                -webkit-flex: 0 0 41.66666667%;
                -ms-flex: 0 0 41.66666667%;
                flex: 0 0 41.66666667%;
                max-width: 41.66666667%
            }

            .col-xlg-4 {
                -webkit-box-flex: 0;
                -webkit-flex: 0 0 33.33333333%;
                -ms-flex: 0 0 33.33333333%;
                flex: 0 0 33.33333333%;
                max-width: 33.33333333%
            }

            .col-xlg-3 {
                -webkit-box-flex: 0;
                -webkit-flex: 0 0 25%;
                -ms-flex: 0 0 25%;
                flex: 0 0 25%;
                max-width: 25%
            }

            .col-xlg-2 {
                -webkit-box-flex: 0;
                -webkit-flex: 0 0 16.66666667%;
                -ms-flex: 0 0 16.66666667%;
                flex: 0 0 16.66666667%;
                max-width: 16.66666667%
            }

            .col-xlg-1 {
                -webkit-box-flex: 0;
                -webkit-flex: 0 0 8.33333333%;
                -ms-flex: 0 0 8.33333333%;
                flex: 0 0 8.33333333%;
                max-width: 8.33333333%
            }

            .col-xlg-pull-12 {
                right: 100%
            }

            .col-xlg-pull-11 {
                right: 91.66666667%
            }

            .col-xlg-pull-10 {
                right: 83.33333333%
            }

            .col-xlg-pull-9 {
                right: 75%
            }

            .col-xlg-pull-8 {
                right: 66.66666667%
            }

            .col-xlg-pull-7 {
                right: 58.33333333%
            }

            .col-xlg-pull-6 {
                right: 50%
            }

            .col-xlg-pull-5 {
                right: 41.66666667%
            }

            .col-xlg-pull-4 {
                right: 33.33333333%
            }

            .col-xlg-pull-3 {
                right: 25%
            }

            .col-xlg-pull-2 {
                right: 16.66666667%
            }

            .col-xlg-pull-1 {
                right: 8.33333333%
            }

            .col-xlg-pull-0 {
                right: auto
            }

            .col-xlg-push-12 {
                left: 100%
            }

            .col-xlg-push-11 {
                left: 91.66666667%
            }

            .col-xlg-push-10 {
                left: 83.33333333%
            }

            .col-xlg-push-9 {
                left: 75%
            }

            .col-xlg-push-8 {
                left: 66.66666667%
            }

            .col-xlg-push-7 {
                left: 58.33333333%
            }

            .col-xlg-push-6 {
                left: 50%
            }

            .col-xlg-push-5 {
                left: 41.66666667%
            }

            .col-xlg-push-4 {
                left: 33.33333333%
            }

            .col-xlg-push-3 {
                left: 25%
            }

            .col-xlg-push-2 {
                left: 16.66666667%
            }

            .col-xlg-push-1 {
                left: 8.33333333%
            }

            .col-xlg-push-0 {
                left: auto
            }

            .offset-xlg-12 {
                margin-left: 100%
            }

            .offset-xlg-11 {
                margin-left: 91.66666667%
            }

            .offset-xlg-10 {
                margin-left: 83.33333333%
            }

            .offset-xlg-9 {
                margin-left: 75%
            }

            .offset-xlg-8 {
                margin-left: 66.66666667%
            }

            .offset-xlg-7 {
                margin-left: 58.33333333%
            }

            .offset-xlg-6 {
                margin-left: 50%
            }

            .offset-xlg-5 {
                margin-left: 41.66666667%
            }

            .offset-xlg-4 {
                margin-left: 33.33333333%
            }

            .offset-xlg-3 {
                margin-left: 25%
            }

            .offset-xlg-2 {
                margin-left: 16.66666667%
            }

            .offset-xlg-1 {
                margin-left: 8.33333333%
            }

            .offset-xlg-0 {
                margin-left: 0
            }
        }

        .col-xlg-1, .col-xlg-2, .col-xlg-3, .col-xlg-4, .col-xlg-5, .col-xlg-6, .col-xlg-7, .col-xlg-8, .col-xlg-9, .col-xlg-10, .col-xlg-11, .col-xlg-12 {
            position: relative;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px
        }

        @media (min-width: 1650px) {
            .widget-app-columns {
                -webkit-column-count: 3;
                -moz-column-count: 3;
                column-count: 3
            }
        }

        @media (max-width: 1370px) {
            .widget-app-columns {
                -webkit-column-count: 2;
                -moz-column-count: 2;
                column-count: 2
            }
        }

        @media (min-width: 768px) {
            .page-wrapper {
                margin-left: 240px
            }

            .footer {
                left: 240px
            }
        }

        @media (max-width: 1023px) {
            .page-wrapper {
                margin-left: 240px;
                transition: 0.2s ease-in
            }

            .footer {
                left: 240px
            }

            .widget-app-columns {
                -webkit-column-count: 1;
                -moz-column-count: 1;
                column-count: 1
            }

            .inbox-center a {
                width: 200px
            }
        }

        @media (min-width: 768px) {
            .navbar-header {
                width: 240px;
                -webkit-flex-shrink: 0;
                -ms-flex-negative: 0;
                flex-shrink: 0
            }

            .navbar-header .navbar-brand {
                padding-top: 0px
            }

            .material-icon-list-demo .icons div {
                width: 33%;
                padding: 15px;
                display: inline-block;
                line-height: 40px
            }

            .mini-sidebar .page-wrapper {
                margin-left: 60px
            }

            .mini-sidebar .footer {
                left: 60px
            }

            .flex-wrap {
                -ms-flex-wrap: nowrap !important;
                flex-wrap: nowrap !important;
                -webkit-flex-wrap: nowrap !important
            }
        }

        @media (max-width: 767px) {
            .topbar {
                position: fixed;
                width: 100%
            }

            .topbar .top-navbar {
                padding-right: 15px;
                -webkit-box-orient: horizontal;
                -webkit-box-direction: normal;
                -webkit-flex-direction: row;
                -ms-flex-direction: row;
                flex-direction: row;
                -webkit-flex-wrap: nowrap;
                -ms-flex-wrap: nowrap;
                flex-wrap: nowrap;
                -webkit-align-items: center
            }

            .topbar .top-navbar .navbar-collapse {
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;
                width: 100%
            }

            .topbar .top-navbar .navbar-nav {
                -webkit-flex-direction: row;
                -ms-flex-direction: row;
                flex-direction: row
            }

            .topbar .top-navbar .navbar-nav > .nav-item.show {
                position: static
            }

            .topbar .top-navbar .navbar-nav > .nav-item.show .dropdown-menu {
                width: 100%;
                margin-top: 0px
            }

            .topbar .top-navbar .navbar-nav > .nav-item > .nav-link {
                padding-left: .50rem;
                padding-right: .50rem
            }

            .topbar .top-navbar .navbar-nav .dropdown-menu {
                position: absolute
            }

            .mega-dropdown .dropdown-menu {
                height: 480px;
                overflow: auto
            }

            .mini-sidebar .page-wrapper {
                margin-left: 0px;
                padding-top: 70px
            }

            .comment-text .comment-footer .action-icons {
                display: block;
                padding: 10px 0
            }

            .vtabs .tabs-vertical {
                width: auto
            }

            .footer {
                left: 0px
            }

            .material-icon-list-demo .icons div {
                width: 100%
            }

            .error-page .footer {
                position: fixed;
                bottom: 0px;
                z-index: 10
            }

            .error-box {
                position: relative;
                padding-bottom: 60px
            }

            .error-body {
                padding-top: 10%
            }

            .error-body h1 {
                font-size: 100px;
                font-weight: 600;
                line-height: 100px
            }

            .login-register {
                position: relative;
                overflow: hidden
            }

            .login-box {
                width: 90%
            }

            .login-sidebar {
                padding: 10% 0
            }

            .login-sidebar .login-box {
                position: relative
            }

            .chat-main-box .chat-left-aside {
                left: -250px;
                position: absolute;
                transition: 0.5s ease-in;
                background: #ffffff
            }

            .chat-main-box .chat-left-aside.open-pnl {
                left: 0px
            }

            .chat-main-box .chat-left-aside .open-panel {
                display: block
            }

            .chat-main-box .chat-right-aside {
                width: 100%
            }

            ul.timeline:before {
                left: 40px
            }

            ul.timeline > li > .timeline-panel {
                width: calc(100% - 90px);
                width: calc(100% - 90px);
                width: calc(100% - 90px);
            }

            ul.timeline > li > .timeline-badge {
                top: 16px;
                left: 15px;
                margin-left: 0
            }

            ul.timeline > li > .timeline-panel {
                float: right
            }

            ul.timeline > li > .timeline-panel:before {
                right: auto;
                left: -15px;
                border-right-width: 15px;
                border-left-width: 0
            }

            ul.timeline > li > .timeline-panel:after {
                right: auto;
                left: -14px;
                border-right-width: 14px;
                border-left-width: 0
            }

            .left-aside {
                width: 100%;
                position: relative;
                border: 0px
            }

            .right-aside {
                margin-left: 0px
            }

            .flex-wrap {
                -ms-flex-wrap: wrap !important;
                flex-wrap: wrap !important;
                -webkit-flex-wrap: wrap !important
            }

            .chat-list li .chat-content {
                width: calc(100% - 80px)
            }

            .flot-chart-content {
                width: 245px
            }
        }
    </style>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url("vender/assets/images/favicon.png"); ?>">
    <title>Hunonic Việt Nam - Bán Hàng</title>
    <style>
        .selectize-dropdown [data-selectable] .highlight {
            background-color: #00aced !important;
            padding: 0px 1px 0px 1px;
        }
    </style>
    <!-- ==========================CSS FILE==================================== -->
    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url("vender/assets/plugins/bootstrap/css/bootstrap.min.css"); ?>" rel="stylesheet">

    <!--    Select Search-->
    <link href="<?= base_url("vender/assets/plugins/selectize/css/selectize.bootstrap3.css"); ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= base_url("vender/css/style.css"); ?>" rel="stylesheet">

    <!-- You can change the theme colors from here -->
    <link href="<?= base_url("vender/css/colors/blue.css"); ?>" id="theme" rel="stylesheet">

    <!-- Datatable CSS Bootstrap 4 -->
    <link href="<?= base_url("vender/assets/plugins/datatable/datatables.min.css"); ?>" rel="stylesheet">

    <!-- PrintJs -->
    <link href="<?= base_url("vender/assets/plugins/printjs/print.min.css"); ?>" rel="stylesheet">
    <link href="<?= base_url("vender/assets/plugins/printjs/printOrder.css"); ?>" media="all" charset="utf-8"
          rel="stylesheet">
    
    <!-- TextEditor -->
    <link href="<?= base_url("vender/css/froala_editor.pkgd.min.css"); ?>" rel="stylesheet">
    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">

    <!-- ==========================JS FILE==================================== -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <script src="<?= base_url("vender/js/html5shiv.js"); ?>"></script>
    <script src="<?= base_url("vender/js/respond.min.js"); ?>"></script>

    <!-- All Jquery -->
    <script src="<?= base_url("vender/assets/plugins/jquery/jquery.min.js"); ?>"></script>

    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url("vender/assets/plugins/bootstrap/js/tether.min.js"); ?>"></script>
    <script src="<?= base_url("vender/assets/plugins/bootstrap/js/bootstrap.min.js"); ?>"></script>
    <script src="<?= base_url("vender/assets/plugins/bootstrap/js/bootstrap-input-spinner.js"); ?>"></script>
    <!--    Handler Datetime-->
    <script src="<?= base_url("vender/assets/plugins/moment/moment.min.js"); ?>"></script>

    <!--    DataTable-->
    <script src="<?= base_url("vender/assets/plugins/datatable/datatables.min.js"); ?>"></script>
    <script src="<?= base_url("vender/js/sum().js"); ?>"></script>
    <!--Select search -->
    <script src="<?= base_url("vender/assets/plugins/selectize/js/standalone/selectize.min.js"); ?>"></script>

    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?= base_url("vender/js/jquery.slimscroll.js"); ?>"></script>

    <!--Wave Effects -->
    <script src="<?= base_url("vender/js/waves.js"); ?>"></script>

    <!--Menu sidebar -->
    <script src="<?= base_url("vender/js/sidebarmenu.js"); ?>"></script>

    <!--stickey kit -->
    <script src="<?= base_url("vender/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"); ?>"></script>

    <!--ChartJS -->
    <script src="<?= base_url("vender/assets/plugins/chart/Chart.min.js"); ?>"></script>

    <!--PrintJS -->
    <script src="<?= base_url("vender/assets/plugins/printjs/print.min.js"); ?>"></script>

    <!-- Accounting JS -->
    <script src="<?= base_url("vender/assets/plugins/accounting/accounting.min.js"); ?>"></script>

    <!--Custom JavaScript -->
    <script src="<?= base_url("vender/js/custom.min.js"); ?>"></script>

    <!-- Style switcher -->
    <script src="<?= base_url("vender/assets/plugins/styleswitcher/jQuery.style.switcher.js"); ?>"></script>

<!--    <script src="--><?//= base_url("node_modules/xlsx/jszip.js"); ?><!--"></script>-->
<!--    <script src="--><?//= base_url("node_modules/xlsx/xlsx.js"); ?><!--"></script>-->

    <script src="<?= base_url("vender/js/tableToExcel.js"); ?>"></script>

    <script src="<?= base_url("vender/js/datetime-moment.js"); ?>"></script>

    <script src="<?= base_url("vender/js/froala_editor.pkgd.min.js"); ?>"></script>

    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

    <!--    <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>-->
<!--    <script src="https://cdn.jsdelivr.net/npm/@editorjs/image@2.3.0"></script>-->
<!--    <script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>-->

</head>

<body class="fix-header fix-sidebar card-no-border">
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
    </svg>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <?php echo $header; ?>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <?php echo $sidebar; ?>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper" style="margin-left: 0px !important;">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <div class="row page-titles p-b-0">
                <div class="col-md-6 col-8 align-self-center">
                    <h3 class="text-themecolor m-b-0 m-t-0"><?php echo $title; ?></h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active"><?php echo $title; ?></li>
                    </ol>
                </div>
            </div>
            <?php echo $content; ?>
        </div>
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>

    <?php echo $footer; ?>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
</body>

</html>
