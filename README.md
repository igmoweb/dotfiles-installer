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

So now, the dotfiles installer will be ready into your dotfiles repo.

### 2. Point to your dotfiles repository ffrom your project

In order to specify a dotfiles repo for your project/s, you need to add the following lines inside `repositories` of your `composer.json` file: 

```json
"repositories": [
    {
      "type": "git",
      "url": "https://github.com/path-to/your-dotfiles-repo.git"
    },
  ],
```

Add this line to your `composer.json` inside your `repositories` attribute:

```json
"repositories": [
    {
      "type": "path",
      "url": "https://github.com/igmoweb/dotfiles-installer.git"
    }
  ],
```

Then add a list of dotfiles that you'd like to bring into 