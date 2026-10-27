# KTWD

A PHP script that makes picture badges for KTWD.

## What it does

`createbadges.php` reads each PNG or JPEG image in `input`, resizes
it, places it on the `badge.png` template with Intel Clear fonts, and
writes the finished badges to `output`.

## Tech

- PHP with the GD image library

## Running

The paths are set for Windows (`E:/KTWD`). Edit `$path` in
`createbadges.php` if needed, then run `run.bat`, which calls PHP from
XAMPP Lite:

```bat
c:\xampplite\php\php.exe E:\KTWD\createbadges.php
```

## License

Licensed under the Apache License 2.0. See [LICENSE](LICENSE).
