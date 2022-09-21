#!/usr/bin/env bash

# This is a script to check (lint) if there are any closed issues in an expected failures file.
# This script does not run in the drone pipeline but can be manually run often to find out if there are still closed issues in an expected failures file.
# Pass GITHUB_ACCESS_TOKEN=(Your Access Token) for unlimited API request to GITHUB API
# To run this script pass EXPECTED_FAILURES_FILE= (Path to expected to failure file)
# Eg : GITHUB_ACCESS_TOKEN=  EXPECTED_FAILURES_FILE=  bash tests/acceptance/lint-closed-issue.sh

log_error() {
	echo -e "\e[31m$1\e[0m"
}

log_info() {
	echo -e "\e[37m$1\e[0m"
}

log_success() {
	echo -e "\e[32m$1\e[0m"
}

GITHUB_API_ENTRY_URL="https://api.github.com/repos/owncloud/"
GITHUB_ISSUE_COMMON_URL="https://github.com/owncloud/"

log_success "Pass Your GITHUB Access Token as GITHUB_ACCESS_TOKEN=(Your Access Token) through ENV for unlimited API Request..."

if [ -n "${EXPECTED_FAILURES_FILE}" ]
then
	if [ -f "${EXPECTED_FAILURES_FILE}" ]
	then
		log_info "Expected failures file ${EXPECTED_FAILURES_FILE} found."
	else
		log_error "Expected failures file ${EXPECTED_FAILURES_FILE} not found"
		log_error "Check the setting of EXPECTED_FAILURES_FILE environment variable"
		exit 1
	fi

	log_info "Checking for closed issues in ${EXPECTED_FAILURES_FILE}."
	echo "......."
	LINE_NUMBER=0
	NO_CLOSED_ISSUE=1
	NO_INVALID_ISSUE=1
	while read -r INPUT_LINE;
	do
		LINE_NUMBER=$(("$LINE_NUMBER" + 1))
		# Ignore feature file lines (starting with -) in order to grab the GITHUB issue link only
		if [[ "${INPUT_LINE}" =~ ^- ]]
		then
			continue
		fi

		# Report suspicious lines like ( https://github.com/owncloud/ocis/issues/111 )
		# There should not be any space inside the brackets surrounding an issue link.
		LINE_FORMAT_ERROR=0
		if [[ "${INPUT_LINE}" =~ \([[:blank:]] ]];
		then
			log_error "Line ${LINE_NUMBER} contains space after the left-bracket"
			LINE_FORMAT_ERROR=1
			NO_INVALID_ISSUE=0
		fi
		if [[ "${INPUT_LINE}" =~ [[:blank:]]\) ]];
		then
			log_error "Line ${LINE_NUMBER} contains space before the right-bracket"
			LINE_FORMAT_ERROR=1
			NO_INVALID_ISSUE=0
		fi
		if [ ${LINE_FORMAT_ERROR} -eq 1 ];
		then
			continue
		fi

		# Match and find the GITHUB issue link like (https://github.com/owncloud/ocis/issues/1239) in description with regex in the expected failures file.
		if [[ "${INPUT_LINE}" =~ \(([a-zA-Z0-9:/.#_-]+)\) ]];
		then
			# Get each issue link from the expected failures file like this (https://github.com/owncloud/ocis/issues/1239)
			# Remove the small bracket () from the issue link
			GITHUB_ISSUE_LINK=$(echo "${BASH_REMATCH[0]}" | tr -d "()")
			# Change the issue link to GITHUB API URL to make request.
			# With this url GITHUB_API_LINK we can make request to get the status
			GITHUB_API_LINK=${GITHUB_ISSUE_LINK/${GITHUB_ISSUE_COMMON_URL}/${GITHUB_API_ENTRY_URL}}
			# Make request with curl
			# Check the state of the issue
			ISSUE_STATE=$(curl -s -XGET -H "Accept: application/vnd.github+json" -H "Authorization: Bearer ${GITHUB_ACCESS_TOKEN}" "${GITHUB_API_LINK}" | jq -r ".state")
			if [ "${ISSUE_STATE}" = "open" ];
			then
				continue
			fi
			if [ "${ISSUE_STATE}" = "closed" ];
			then
				NO_CLOSED_ISSUE=0
				log_error "Issue \033[1;37m${GITHUB_ISSUE_LINK} \033[0;31mis closed but still in expected failures"
				continue
			fi
			# The issue state is not "open" or "closed". Something is wrong.
			# If the link goes to an issue number that does not exist, then the state is "null"
			NO_INVALID_ISSUE=0
			if [ "${ISSUE_STATE}" = "null" ];
			then
				log_error "Issue \033[1;37m${GITHUB_ISSUE_LINK} \033[0;31mdoes not exist"
				continue
			fi
			# Otherwise, the link might be to a completely different place. The curl response probably has no "state".
			log_error "Issue \033[1;37m${GITHUB_ISSUE_LINK} \033[0;31mhas unknown state - maybe the issue link is invalid"
		fi
	done < "${EXPECTED_FAILURES_FILE}"

	# Last Check for if no closed issues in the expected failures file
	if [ ${NO_CLOSED_ISSUE} -eq 1 ];
	then
		log_success "There are no closed issues in ${EXPECTED_FAILURES_FILE}."
	fi

	if [ ${NO_INVALID_ISSUE} -eq 0 ];
	then
		log_error "There are invalid issue links in ${EXPECTED_FAILURES_FILE}."
		exit 1
	fi
else
	log_error "Environment variable EXPECTED_FAILURES_FILE must be defined to be the file to check"
	exit 1
fi
