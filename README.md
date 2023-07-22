# Saifur-FileManager
A dynamic File Manager

<!-- <a href="https://packagist.org/packages/saifur/filemanager"><img src="https://img.shields.io/packagist/dt/saifur/filemanager" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/saifur/filemanager"><img src="https://img.shields.io/packagist/v/saifur/filemanager" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/saifur/filemanager"><img src="https://img.shields.io/packagist/l/saifur/filemanager" alt="License"></a> -->

## Contents
- [Saifur-FileManager](#saifur-filemanager)
  - [Contents](#contents)
  - [Design Patterns](#design-patterns)
  - [Features](#features)
    - [Actions](#actions)
  - [Documentation, Installation, and Usage Instructions](#documentation-installation-and-usage-instructions)
    - [Laravel Commands](#laravel-commands)
    - [DB Change](#db-change)
    - [Routes](#routes)
  - [Contributor](#contributor)
  - [Alternatives](#alternatives)
  - [License](#license)

## Design Patterns
- Bridge


## Features
- File upload and management
- Uploading validation
- Downloading
- Cropping and resizing of images
- Managing Folders

### Actions
File manager actions typically refer to the various operations or actions that can be performed on files or directories within a file management system. Here are some common file manager actions:

    Create: Create a new file or directory within the file management system.
    Delete: Remove a file or directory from the file management system.
    Rename: Change the name of a file or directory.
    Copy: Duplicate a file or directory, creating an identical copy.
    Move: Transfer a file or directory from one location to another within the file management system.
    Edit: Modify the content or properties of a file.
    View: Display the contents of a file.
    Upload: Add files or directories to the file management system from an external source.
    Download: Save a copy of a file from the file management system to a local device.
    Permissions: Set or modify the access permissions of a file or directory, determining who can read, write, or execute it.
    Search: Look for specific files or directories based on search criteria.
    Sort: Arrange files or directories in a specific order, such as alphabetical or by date modified.
    Compress/Extract: Compress multiple files or directories into an archive or extract files from an existing archive.
    Share: Provide access to specific files or directories to other users or shareable links.
    Preview: Display a preview or thumbnail of a file's content without opening it.

## Documentation, Installation, and Usage Instructions
This package allows you to manage your logs.

Once installed you can do stuff like this:


### Laravel Commands
<!-- https://unisharp.github.io/laravel-filemanager/installation -->

```
composer require saifur/filemanager
php artisan vendor:publish --tag=public --force
php artisan vendor:publish --tag=config --force
php artisan storage:link
composer dump-autoload
```

### DB Change


### Routes
- in ```config/sfm.php``` configuration file ```use_package_routes = true``` to use the package routes


## Contributor

- Md. Saifur Rahman


|[![Portfolio](https://img.shields.io/badge/Portfolio-%23009639.svg?style=for-the-badge&logo=Hyperledger&logoColor=white)](https://saifurrahman.my.canva.site) | [![CV](https://img.shields.io/badge/CV-%23009639.svg?style=for-the-badge&logo=DocuSign&logoColor=white)](https://docs.google.com/document/d/1txBCiMjPqH7GR8FDMQMAw09vemsB-nJb/edit?usp=sharing&ouid=113622980255867007734&rtpof=true&sd=true) | [![LinkedIn](https://img.shields.io/badge/linkedin-%230077B5.svg?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/saifurrahman1193/) | [![GitHub](https://img.shields.io/badge/github-%23121011.svg?style=for-the-badge&logo=github&logoColor=white)](https://github.com/saifurrahman1193/saifurrahman1193) | [![Stack Overflow](https://img.shields.io/badge/-Stackoverflow-FE7A16?style=for-the-badge&logo=stack-overflow&logoColor=white)](https://stackoverflow.com/users/14350717/md-saifur-rahman) | 
|-|-|-|-|-|
| [![Hackerrank](https://img.shields.io/badge/-Hackerrank-2EC866?style=for-the-badge&logo=HackerRank&logoColor=white)](https://www.hackerrank.com/saifur_rahman111) | [![Beecrowd](https://img.shields.io/badge/Beecrowd-%23009639.svg?style=for-the-badge&logo=Bugcrowd&logoColor=white)](https://www.beecrowd.com.br/judge/en/profile/18847) | [![LeetCode](https://img.shields.io/badge/LeetCode-000000?style=for-the-badge&logo=LeetCode&logoColor=#d16c06)](https://leetcode.com/saifurrahman1193) | [![YouTube](https://img.shields.io/badge/YouTube-%23FF0000.svg?style=for-the-badge&logo=YouTube&logoColor=white)](https://www.youtube.com/playlist?list=PLwJWgDKTF5-xdQttKl7cRx8Yhukv7Ilmg)| |

## Alternatives
- https://github.com/UniSharp/laravel-filemanager
- https://github.com/alexusmai/laravel-file-manager
- https://github.com/mafftor/laravel-file-manager
- https://github.com/yesteamtech/laravel-file-manager
- https://github.com/rudiedirkx/laravel-file-manager
- https://github.com/Binay7587/laravel-filemanager

## License
The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
