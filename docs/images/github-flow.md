# GitHub Flow

We adhere to the [GitHub flow](https://docs.github.com/en/get-started/quickstart/github-flow/) when working with Git and GitHub.

With the GitHub flow, we work on features and bugfixes in branches. We make a pull request from our branch to `main` when we're done. We request a review from another developer. If the reviewer approves, we merge the pull request.

In addition to the GitHub flow, we make an issue for every feature or bug we work on.

## Step-by-step

1. Get assigned (or assign yourself) to an issue (create one if necessary)

2. From the issue use the "Create a branch" button under the "Development" section to create a branch

3. Name the branch either:

    * `feature/issue-name` for a new feature

    * `bugfix/issue-name` for a bugfix

4. Switch to the branch in your terminal:

    ```bash
    git checkout feature/issue-name
    ```

5. Make your changes to the code

6. Commit your changes:

    ```bash
    # First we run pint to format our code
    ./vendor/bin/pint --dirty

    # Then we add and commit our changes
    git add .
    git commit -m "Add a useful commit message"
    ```

7. Push your changes to GitHub:

    ```bash
    git push
    ```

8. Feel free to repeat the above steps as many times as you want, making as many commits as you want and pushing as many times as you want.

9. When you're done, create a pull request from your branch to `main`.

10. Explain in the PR description what you did and why you did it.

    **Make a clear `# WIP` section at the top of the description** if the PR is not ready to be merged yet, but you want to get feedback on it.

11. **All done and ready to merge?** Let's first make sure your branch is up-to-date with main:

    * **The whole team should now NOT make any changes to main until your PR is merged. Nobody but you will merge**

    * Switch to main:
        ```bash
        git checkout main
        ```

    * Pull the latest changes from GitHub:
        ```bash
        git pull
        ```

    * Switch back to your branch:
        ```bash
        git checkout feature/issue-name
        ```

    * Merge main into your branch:
        ```bash
        git merge main
        ```

    * This is the point where you find out if there are any merge conflicts.

    * Resolve the merge conflicts: [How to resolve merge conflicts](https://docs.github.com/en/github/collaborating-with-issues-and-pull-requests/resolving-a-merge-conflict-using-the-command-line)
    
    * Test if your merges didn't break anything.

    * Commit your merge changes:
        ```bash
        git add .
        git commit -m "Merge main into feature/issue-name"
        ```

    * Push your changes to GitHub:
        ```bash
        git push
        ```

12. Request a review from another developer.

13. If the reviewer approves, merge the PR. We use the "Squash and merge" option to keep the commit history clean (it combines all your commits into one).

14. Delete the branch. You can do this from the PR page. *(There's no need to keep the branch around after it's merged, the code is now in `main`)*

## 🥵 Do's and don'ts

### Do's

* *Do* make an issue for every feature or bug you work on.

* *Do* make a pull request for every feature or bug you work on.

* *Do* make a pull request from your branch to `main`.

* *Do* merge main into your branch before we merge your pull request.

* *Do* request a review from another developer.

* *Do* merge the pull request when the reviewer approves.

* *Do* delete the branch after merging the pull request.

### Don'ts

* *Don't* commit directly to `main`.

* *Don't* delete the branch before merging the pull request.

* *Don't* use dangerous commands like:
    
    * `git push --force` - This can overwrite other people's work

    * `git reset --hard` - This can delete work that hasn't been pushed yet

    * `git rebase` - This can rewrite history (removing commits) and cause conflicts

* *Don't* make a ton of changes in one pull request. It's better to make multiple small pull requests than one big one.

* *Don't* merge your Pull Request without it being up-to-date with `main` and without a review from another developer.

* *Don't* resolve merge conflicts without testing if your merges didn't break anything.

* *Don't* waste time on merge conflicts without having the team stop making changes to `main` first.

**Most importantly:**

* *Don't* stress! We're all learning and we're all here to help each other. If you're not sure about something, ask for help. Git can be confusing, but you'll get the hang of it eventually 😊
