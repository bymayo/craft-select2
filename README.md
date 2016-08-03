<img src="https://raw.githubusercontent.com/madebyshape/select2/master/screenshots/icon.png" width="50">

# Select2

Select2 is a Craft CMS fieldtype that uses the popular jQuery plugin - `Select2` (https://select2.github.io). It extends the functionality of a `<select>` field, allowing users to search/filter down their options.

This fieldtype also comes with predefined JSON lists to take the chore out of creating fields such as Country, State or Social Network `<select>` fields. 

You can also specify your own JSON files, which means if you require the same field inside a Matrix or a Supertable for example, you don't have to create all them options again!

## Features

- Extends `<select>` field, allowing to search and filter `<option>`'s
- Allow multiple option selections
- Limit the amount of options that can be selected
- Placeholder
- Predefined JSON lists
- Add custom JSON files

## Install

- Add the `select2` directory into your `craft/plugins` directory.
- Navigate to Settings -> Plugins and click the "Install" button.

## Predefined JSON Lists

- Countries
- Countries (2 Digit ISO)
- Countries (3 Digit ISO)
- Currency (3 Digit ISO)
- Languages (2 Digit ISO)
- Social Networks
- UK Counties
- US States

## Usage

### Using custom JSON files

Select2 gives you the ability to add custom JSON files to the fields. To do this create a `select2` folder inside your `craft/templates` folder. This folder name can be changed by defining the the config settings below in your `craft/config/general.php` file.

   'select2' => [
	   'jsonFolder' => 'mfmfms'
   ]
   
By placing your JSON files inside this folder, they will automatically appear in the `JSON` list when setting up the field.

## Settings

- List
- JSON 
- Select Multiple?
- Limit
- Placeholder

## Templating

(How to use in template)

## Roadmap

- Template tags to output both label and value
- Ability to add `<optgroup>`'s
- Ability to add more than a label and value

## Credits