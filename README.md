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
  ],
```

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