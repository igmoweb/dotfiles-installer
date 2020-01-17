# Dotfiles Installer

A composer installer for your dotfiles.

It allows you to have a centralize repository for your common dotfiles and share them between your different projects.

## Getting started

You will need two different repositories:

- One for your dotfiles.
- Another for one project where you want to use one or more dotfiles from the previous repository.

### 1. Install Dotfiles Installer as a dependency in your dofiles repository

Your dotfiles repo needs to use this package as a dependency. In order to do that, create a `composer.json` file in your dotfiles repository (you can use `composer init` to speed up the process) and then install this repository as a dependency:

`composer require igmoweb/dotfiles-installer`

You also need to specify the following type in `composer.json` so the installer can recognize your dotfiles repo as a dotfiles library.

```json
"type": "dotfiles-library"
```

So now, the dotfiles installer will be ready into your dotfiles repo.

### 2. Point to your dotfiles repository ffrom your project

In order to specify a dotfiles repo for your project/s, you need to add the following lines inside `repositories` of your `composer.json` file: 

```json
"repositories": [
    {
      "type": "git",
      "url": "https://github.com/youruser/dotfiles-repo.git"
    },
    {
      "type": "git",
      "url": "https://github.com/igmoweb/dotfiles-installer.git"
    }
  ],
```

### 3. Specify the list of dotfiles you need for your project

Then add a list of dotfiles that you'd like to bring into inside `extra.dotfiles` property. For example:

```json
"extra": {
    "dotfiles": [
      ".babelrc.js",
      ".eslintignore",
      ".eslintrc.json",
      ".prettierignore",
      ".prettierrc.json",
      "phpcs.xml",
      ".stylelintrc"
    ]
  },
```

Now install your dotfiles repository as a dependency in composer:

`composer require youruser/dotfiles-repo:dev-master --dev`

The installer will copy any dotfile you specified in your `composer.json` to your root file.

Do the same in any other project you own and you'll be able to share your dotfiles across different projects.

## Some notes

- `composer update` won't copy the files again. If you want to update the package version, delete your `vendor` folder and run `composer install/require/update` again.
- If a dotfile exists already in your root folder, it won't be overwritten. This is because you could need to tweak some dotfiles depending on your project and you don't want to overwrite those. If you need a refresh of the files because you're upgrading your dotfiles repository version, make sure that you delete the dotfiles before upgrading. 