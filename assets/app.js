import './styles/app.scss';
import './bootstrap';

const $ = require('jquery');
require('bootstrap');



import { registerReactControllerComponents } from '@symfony/ux-react';
registerReactControllerComponents(require.context('./react/controllers', true, /\.(j|t)sx?$/));
