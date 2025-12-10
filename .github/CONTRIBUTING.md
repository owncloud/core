First of all, thank you for taking the time to read this and your interest in contributing to ownCloud.

The following is a set of guidelines for contributing to most of the projects hosted in the [ownCloud Organization](https://github.com/owncloud) on [GitHub](https://www.github.com). These are mostly guidelines, not rules. Use your best judgment, and feel free to propose changes to this document in a pull request.

## I don't want to read this whole thing I just have a question

> **Note:** Please don't file an issue to ask a question. You'll get faster results by using the resources below.

For general questions, please refer to [ownCloud's FAQs](https://owncloud.com/faq/) or ask on the [ownCloud Central Server](https://central.owncloud.org/).

We also have a [Rocket Chat Server](https://talk.owncloud.com/channel/general) to answer your questions.
There is also an [IRC channel](https://webchat.freenode.net/?channels=owncloud&uio=d4).

## Reporting Bugs

This section guides you through submitting a bug report for ownCloud. Following these guidelines helps maintainers and the community understand your report :pencil:, reproduce the behavior :computer: :computer:, and find related reports :mag_right:.

Before creating bug reports, please check [this list](#before-submitting-a-bug-report) as you might find out that you don't need to create one. When you are creating a bug report, please [include as many details as possible](#how-do-i-submit-a-good-bug-report). Fill out [the required template](https://github.com/owncloud/core/issues/new?Type%3ABug&template=issue_template.md), the information it asks for helps us resolve issues faster.

> **Note:** If you find a **Closed** issue that seems like it is the same thing that you're experiencing, open a new issue and include a link to the original issue in the body of your new one. If you have permission to reopen the issue, feel free to do so.

#### Before Submitting A Bug Report

*   **Make sure you are running a recent version** Usually, developers' interest in old versions of software drops very fast once a new shiny version has been released. So the general recommendation is: Use the latest released version or even the current master to reproduce problems that you might encounter. That helps a lot to attract developers attention.
*   **Determine which [repository](https://github.com/owncloud) the problem should be reported in**.
*   **Perform a [cursory search](https://github.com/search?q=+is%3Aissue+user%3Aowncloud)** with possibly a more granular filter on the repository, to see if the problem has already been reported. If it has **and the issue is still open**, add a comment to the existing issue instead of opening a new one **if you have new information**. Please abstain from adding "plus ones", except using the Github emojis. That might indicate how many users are affected.

#### How Do I Submit A (Good) Bug Report

Bugs are tracked as [GitHub issues](https://guides.github.com/features/issues/). After you've determined [which repository](https://github.com/owncloud) your bug is related to, create an issue on that repository and provide the following information by filling in [the template](https://github.com/owncloud/core/issues/new?Type%3ABug&template=issue_template.md).

Explain the problem and include additional details to help maintainers reproduce the problem:

*   **Use a clear and descriptive title** for the issue to identify the problem.
*   **Describe the exact steps which reproduce the problem** in as many details as possible. Start with describing, from a user perspective, what you tried to achieve, i.e. "I want to share some pictures with Grandma". When listing steps, **don't just say what you did, but explain how you did it**. For example, if you uploaded a file to ownCloud, say which client you used, which way of uploading you chose, if the name was special somehow and how big it was.
*   **Provide specific examples to demonstrate the steps**. Include links to files or GitHub projects, or copy/pasteable snippets, which you use in those examples. If you're providing snippets in the issue, use [Markdown code blocks](https://help.github.com/articles/markdown-basics/#multiple-lines).
*   **Describe the behavior you observed after following the steps** and point out what exactly is the problem with that behavior.
*   **Explain which behavior you expected to see instead and why.**
*   **Include screenshots and animated GIFs** which show you following the described steps and clearly demonstrate the problem. You can use [this tool](https://www.cockos.com/licecap/) to record GIFs on macOS and Windows, and [this tool](https://github.com/colinkeenan/silentcast) or [this tool](https://github.com/GNOME/byzanz) on Linux.
*   **If you report a web browser related problem**, consider to using the browser's Web developer tools (such as the debugger, console or network monitor) to check what happened. Make sure to add screenshots of the utilities if you are short of time to interpret it.
*   **If the problem wasn't triggered by a specific action**, describe what you were doing before the problem happened and share more information using the guidelines below.

Provide more context by answering these questions:

*   **Did the problem start happening recently** (e.g. after updating to a new version) or was this always a problem?
*   If the problem started happening recently, **can you reproduce the problem in an older version?** What's the most recent version in which the problem doesn't happen?
*   **Can you reliably reproduce the issue?** If not, provide details about how often the problem happens and under which conditions it normally happens.

Include details about your configuration and environment as asked for in the template.

### Suggesting Enhancements

This section guides you through submitting an enhancement suggestion for ownCloud, including completely new features and minor improvements to existing functionality. Following these guidelines helps maintainers and the community understand your suggestion :pencil: and find related suggestions :mag_right:.

Before creating enhancement suggestions, please check [this list](#before-submitting-an-enhancement-suggestion) as you might find out that you don't need to create one. When you are creating an enhancement suggestion, please [include as many details as possible](#how-do-i-submit-a-good-enhancement-suggestion).

#### Before Submitting An Enhancement Suggestion

*   **Check if there's already an extension or other component which provides that enhancement, even in a different way.**
*   **Perform a [cursory search](https://github.com/search?q=+is%3Aissue+user%3Aowncloud)** to see if the enhancement has already been suggested. If it has, add a comment to the existing issue instead of opening a new one. Feel free to use the Github emojis to indicate that you are in favour of an enhancement request.

#### How Do I Submit A (Good) Enhancement Suggestion

Enhancement suggestions are tracked as [GitHub issues](https://guides.github.com/features/issues/). After you've determined [which repository](https://github.com/owncloud) your enhancement suggestion is related to, create an issue on that repository and provide the following information:

*   **Use a clear and descriptive title** for the issue to identify the suggestion.
*   **Provide a step-by-step description of the suggested enhancement** in as many details as possible.
*   **Provide specific examples to demonstrate the steps**. Include copy/pasteable snippets which you use in those examples, as [Markdown code blocks](https://help.github.com/articles/markdown-basics/#multiple-lines).
*   **Explain why this enhancement would be useful** to most ownCloud users.
*   **List some other projects or products where this enhancement exists.**


## Contributing to Source Code

Thanks for wanting to contribute source code to ownCloud. That's great!

Before we're able to merge your code into the ownCloud core, you need to sign our [Contributors License Agreement](https://owncloud.com/contribute/join-the-development/contributor-agreement/).

Please read the [Developer Manuals](https://doc.owncloud.com/server/developer_manual/) to learn how to create your first application or how to test the ownCloud code with PHPUnit.

In order to constantly increase the quality of our software we can no longer accept pull requests which submit un-tested code.
It is a must have that changed and added code segments are unit tested.
In some areas unit testing is hard (aka almost impossible) as of today - in these areas refactoring WHILE fixing a bug is encouraged to enable unit testing.

## Translations
Please submit translations via [Transifex](https://www.transifex.com/projects/p/owncloud/)
