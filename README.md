[![Build status](https://dev.azure.com/OndrejGolasowski/stcblog/_apis/build/status/stcblog-CI)](https://dev.azure.com/OndrejGolasowski/stcblog/_build/latest?definitionId=2)
[![License: GPL v3](https://img.shields.io/badge/License-GPLv3-blue.svg)](https://www.gnu.org/licenses/gpl-3.0)

# STCblog Wordpress theme
Simple original Wordpress theme designed for Microsoft Student Trainee Center project [studuj.digital](https://studuj.digital/).
The theme was created as a graduation thesis of Andrew Golasowski. It is released as open-source to provide a learning tool for students not only at [SPS Karvina](http://spskarvina.cz/).

## About project
Whole theme respects individual requirements of the Microsoft STC and the Microsoft Fluent Design System.
The project depends on Fabric UI styles. 

## Features
### Responsive
![](docs/img/readme1.gif)

### Mobile-ready menu
![](docs/img/readme2.gif)

### Animated search bar
![](docs/img/readme3.gif)

### Support for [Easy Table of Contents](https://cs.wordpress.org/plugins/easy-table-of-contents/)
![](docs/img/readme4.gif)

## License and copyright
Project is licensed under GNU GPLv3.
(C) Ondrej Golasowski, Petr Kucera and contributors.

## Fabric UI changes
Edited _Animation.Mixins.scss - @mixin ms-motion-scaleDownIn doesn't retain state - set to none.