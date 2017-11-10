#!/usr/bin/env bash
yarn prod
git push prod $CI_BRANCH
sshpass -p ${SFTP_PASS} sftp -P2222 ${SFTP_USERNAME}@${WPE_INSTALL}.sftp.wpengine.com:wp-content/themes/${THEME_NAME} <<< $'cd assets\n mkdir built\n put -r assets/built\n'
