<h1 name="user-content-readme-top">TagManager</h1>
<p align="center">
    <a href="https://github.com/aljawaid/TagManager/releases">
        <img src="https://img.shields.io/github/v/release/aljawaid/TagManager?style=for-the-badge&color=brightgreen" alt="GitHub Latest Release (by date)" title="GitHub Latest Release (by date)">
    </a>
    <a href="https://github.com/aljawaid/TagManager/releases">
        <img src="https://img.shields.io/github/downloads/aljawaid/TagManager/total?style=for-the-badge&color=orange" alt="GitHub All Releases" title="GitHub All Downloads">
    </a>
    <a href="https://github.com/aljawaid/TagManager/releases">
        <img src="https://img.shields.io/github/directory-file-count/aljawaid/TagManager?style=for-the-badge&color=orange" alt="GitHub Repository File Count" title="GitHub Repository File Count">
    </a>
    <a href="https://github.com/aljawaid/TagManager/releases">
        <img src="https://img.shields.io/github/repo-size/aljawaid/TagManager?style=for-the-badge&color=orange" alt="GitHub Repository Size" title="GitHub Repository Size">
    </a>
    <a href="https://github.com/aljawaid/TagManager/releases">
        <img src="https://img.shields.io/github/languages/code-size/aljawaid/TagManager?style=for-the-badge&color=orange" alt="GitHub Code Size" title="GitHub Code Size">
    </a>
</p>
<p align="center">
    <a href="https://github.com/aljawaid/TagManager/discussions">
        <img src="https://img.shields.io/github/discussions/aljawaid/TagManager?style=for-the-badge&color=blue" alt="GitHub Discussions" title="Read Discussions">
    </a>
    <a href="https://github.com/aljawaid/TagManager/compare">
        <img src="https://img.shields.io/github/commits-since/aljawaid/TagManager/latest?include_prereleases&style=for-the-badge&color=blue" alt="GitHub Commits Since Last Release" title="GitHub Commits Since Last Release">
    </a>
    <a href="https://github.com/aljawaid/TagManager/compare">
        <img src="https://img.shields.io/github/commit-activity/m/aljawaid/TagManager?style=for-the-badge&color=blue" alt="GitHub Commit Monthly Activity" title="GitHub Commit Monthly Activity">
    </a>
    <a href="https://github.com/kanboard/kanboard" title="Kanboard - Kanban Project Management Software">
        <img src="https://img.shields.io/badge/Plugin%20for-kanboard-D40000?style=for-the-badge&labelColor=000000" alt="Kanboard">
    </a>
</p>

TagManager provides clearer project and global tag administration, board filtering, stable styling references and accessible display options.

<p align="right">[<a href="#user-content-readme-bottom">&#8595; Bottom</a>] [<a href="#screenshots">&#8594; Next</a>] [<a href="#user-content-readme-top">&#8593; Top</a>]</p>

## Features

- Distinguish project and global tags with dedicated SVG icons
- Filter project boards by tag
- Choose filled or transparent task-tag presentation from the administrator settings
- Retain each configured tag colour as a border when transparent presentation is enabled
- Use the larger colour selection provided by [ColorManager](https://github.com/aljawaid/ColorManager)
- Show stable HTML/CSS IDs and classes for further custom styling
- Render compact inline tags in Task2PDF output to prevent overlapping content

**Global Tags**
- Show tag counts
- Show actual colours with values

**Project Tags**
- Show tag counts
- Add a direct link to project tags in the project dropdown menu
- Show global tags alongside project tags in Project Settings
- Show project tags in a separate section beneath the task details
- Show actual colours with values

<p align="right">[<a href="#user-content-readme-bottom">&#8595; Bottom</a>] [<a href="#features">&#8592; Previous</a>] [<a href="#usage">&#8594; Next</a>] [<a href="#user-content-readme-top">&#8593; Top</a>]</p>

## Screenshots

**Project Settings - Menu**  

![Project Settings Menu](../master/Screenshots/screenshot-project-settings-menu.png "Project Settings Menu")

---

**Project Settings - Tags**  

![Project Tags](../master/Screenshots/screenshot-project-settings-tags-section.png "Project Tags Section")

---

**Project Settings - Tags - Expanded**  

![Project Tags](../master/Screenshots/screenshot-project-settings-tags-section-expanded.png "Project Tags Section - Expanded")

---

**Settings - Global Tags**  

![Global Tags](../master/Screenshots/screenshot-settings-global-tags.png "Global Tags Section")

---

**Board - Task Tag Filter**  

![Board](../master/Screenshots/screenshot-task-tag-filter.png "Task Tag Filter")

---

<p align="right">[<a href="#user-content-readme-bottom">&#8595; Bottom</a>] [<a href="#features">&#8592; Previous</a>] [<a href="#installation--compatibility">&#8594; Next</a>] [<a href="#user-content-readme-top">&#8593; Top</a>]</p>

## Usage

Go to `Project Settings` &#10562; `Tags`

**_or_**

Go to `Settings` &#10562; `Global Tags`

**_or_**

Go to `Project Board` &#10562; `Tag Filter`

Administrators can choose the site-wide task-tag appearance at `Settings` &#10562; `Tag appearance`. The default **Coloured tags** mode preserves the existing filled pills. **Transparent tags** removes the fill from task tags while retaining their configured colour as a border, which can improve legibility on coloured cards. This is an interim visibility option; it does not replace tag names with icons.

<p align="right">[<a href="#user-content-readme-bottom">&#8595; Bottom</a>] [<a href="#screenshots">&#8592; Previous</a>] [<a href="#authors--contributors">&#8594; Next</a>] [<a href="#user-content-readme-top">&#8593; Top</a>]</p>

## Installation & Compatibility

<p align="left">
    <a href="https://github.com/aljawaid/TagManager/actions/workflows/linter.yml">
        <img src="https://github.com/aljawaid/TagManager/actions/workflows/linter.yml/badge.svg?branch=master&event=push" alt="Code Scanning" title="View Test">
    </a>
    <a href="https://github.com/aljawaid/TagManager/actions/workflows/php-compatibility.yaml">
        <img src="https://github.com/aljawaid/TagManager/actions/workflows/php-compatibility.yaml/badge.svg?branch=master&event=push" alt="PHP Compatibility Test" title="View Test">
    </a>
</p>

<details>
    <summary><strong>Installation</strong></summary>

- Install via the **[Kanboard](https://github.com/kanboard/kanboard "Kanboard - Kanban Project Management Software") Plugin Directory** or see [INSTALL.md](../master/INSTALL.md)
- Read the full [**Changelog**](../master/changelog.md "See changes") to see the latest updates

</details>
<details>
    <summary><strong>Compatibility</strong></summary>

- Requires [Kanboard](https://github.com/kanboard/kanboard "Kanboard - Kanban Project Management Software") ≥`1.2.54`
- Tested with PHP `8.2`, `8.3`, `8.4` and `8.5`
- **Other Plugins & Action Plugins**
  - Compatible with [ColorManager](https://github.com/aljawaid/ColorManager), [Glancer](https://github.com/aljawaid/Glancer)
  - Includes a print-specific inline rendering path for Task2PDF `1.8.0`
  - Replaces [KanboardColorfulTags](https://github.com/ThomasTJdev/KanboardColorfulTags)
- **Core Files & Templates**
  - `02` Template overrides
  - _No database changes_

</details>
<details>
    <summary><strong>Translations</strong></summary>

- English (UK)
- Portuguese (Brazil)
- _Starter template available_

</details>

<p align="right">[<a href="#user-content-readme-bottom">&#8595; Bottom</a>] [<a href="#usage">&#8592; Previous</a>] [<a href="#license">&#8594; Next</a>] [<a href="#user-content-readme-top">&#8593; Top</a>]</p>

## Authors & Contributors

- [aljawaid](https://github.com/aljawaid) - Author
- [Timo Stahl](https://github.com/TimoStahl/kanboard_plugin_taglist) - Tag Filter feature
- [ThomasTJdev](https://github.com/ThomasTJdev/KanboardColorfulTags) - HTML/CSS Selectors feature
- _Contributors welcome_

<p align="right">[<a href="#user-content-readme-bottom">&#8595; Bottom</a>] [<a href="#installation--compatibility">&#8592; Previous</a>] [<a href="#user-content-readme-top">&#8593; Top</a>]</p>

## License

- This project is distributed under the [MIT License](../master/LICENSE "Read The MIT license")

---

<p align="center">
    <a href="https://github.com/aljawaid/TagManager/stargazers" title="View Stargazers">
        <img src="https://img.shields.io/github/stars/aljawaid/TagManager?logo=github&style=flat-square" alt="TagManager">
    </a>
    <a href="https://github.com/aljawaid/TagManager/forks" title="See Forks">
        <img src="https://img.shields.io/github/forks/aljawaid/TagManager?logo=github&style=flat-square" alt="TagManager">
    </a>
    <a href="https://github.com/aljawaid/TagManager/blob/master/LICENSE" title="Read License">
        <img src="https://img.shields.io/github/license/aljawaid/TagManager?style=flat-square" alt="TagManager">
    </a>
    <a href="https://github.com/aljawaid/TagManager/issues" title="Open Issues">
        <img src="https://img.shields.io/github/issues-raw/aljawaid/TagManager?style=flat-square" alt="TagManager">
    </a>
    <a href="https://github.com/aljawaid/TagManager/issues?q=is%3Aissue+is%3Aclosed" title="Closed Issues">
        <img src="https://img.shields.io/github/issues-closed/aljawaid/TagManager?style=flat-square" alt="TagManager">
    </a>
    <a href="https://github.com/aljawaid/TagManager/discussions" title="Read Discussions">
        <img src="https://img.shields.io/github/discussions/aljawaid/TagManager?style=flat-square" alt="TagManager">
    </a>
    <a href="https://github.com/aljawaid/TagManager/compare/" title="Latest Commits">
        <img alt="GitHub commits since latest release (by date)" src="https://img.shields.io/github/commits-since/aljawaid/TagManager/latest?style=flat-square">
    </a>
</p>
<a name="user-content-readme-bottom"></a>
<p align="right">[<a href="#user-content-readme-top">&#8593; Top</a>]</p>
