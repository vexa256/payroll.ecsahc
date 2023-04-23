#!/bin/bash

# Set the target directory
target_directory="/var/www/html/payroll.local/sys"

# Find and delete all files not ending with .blade.php
find "$target_directory" -type f -not -name "*.blade.php" -exec rm -f {} \;
