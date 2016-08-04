<img src="https://github.com/madebyshape/select2/raw/master/screenshots/icon.png" width="50">

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

- Countries `United Kingdom`
- Countries (2 Digit ISO) `GB`
- Countries (3 Digit ISO) `GBR`
- Currency (3 Digit ISO) `EUR`
- Languages (2 Digit ISO) `EN`
- Social Networks `Facebook`
- UK Counties `Greater Manchester`
- US States `NY`

(If you have a list idea that you'd like included, please start a Github Issue)

## Using custom JSON files

Select2 gives you the ability to add custom JSON files to the fields. 

### Setup

To use custom JSON files, create a `select2` folder inside your `craft/templates` folder. 

This folder name can be changed by defining the the config settings below in your `craft/config/general.php` file.

```
'select2' => [
   'jsonFolder' => 'jsonFolder'
]
```
   
By placing your JSON files inside this folder, they will automatically appear in the `JSON` list when setting up the field.

### JSON Format

To make sure the data loads in to the field correctly, the JSON files you create need to have a label and a value. For example -

```
[
    {
        "label": "Hamburger",
        "value": "hamburger"
    },
    {
        "label": "Hot Dog",
        "value": "hotDog"
    },
    {
        "label": "Chicken Wings",
        "value": "chickenWings"
    }
]
```

The content inside label and value can be formatted however you wish (camelCase, UPPERCASE etc).


## Field Settings

<table>
	<tr>
		<td><strong>Setting</strong></td>
		<td><strong>Description</strong></td>
	</tr>
	<tr>
		<td>List</td>
		<td>Allows you to choose a predefined list, or select JSON to specify your own list</td>
	</tr>
	<tr>
		<td>JSON</td>
		<td>Pulls through all JSON files stored in the `select2` folder (See **Using custom JSON files**)</td>
	</tr>
	<tr>
		<td>Multiple</td>
		<td>If you want to allow more than 1 option to be selected, turn this switch on</td>
	</tr>
	<tr>
		<td>Limit</td>
		<td>If Multiple is set, then you can specify the maximum amount of options that can be selected</td>
	</tr>
	<tr>
		<td>Placeholder</td>
		<td>A placeholder that appears in the Select2 field, e.g. 'Please Select a Country'</td>
	</tr>
</table>

## Templating

Select2 outputs either a string or array depending on if you have checked the multiple option when setting up the field. The TWIG code for this is very basic and no different to looping through a Matrix etc. For example, if your field is called `profileCountries` the template tags would be:

```HTML
{% for county in entry.profileCountries %}
	{{ country }}
{% endfor %}
```

## Roadmap

- More predefined JSON lists
- Template tags to output both label and value
- Ability to add `<optgroup>`'s
- Ability to add more than a label and value
- Adjust CSS (Possibly port it to SASS) to make the field work better with Craft CMS styling

## Credits

- Drop Down Menu by Nick Bluth from Noun Project (https://thenounproject.com/npbluth)
