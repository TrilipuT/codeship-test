/**
 * Used to identify visitors with Segment after a form submission
 * @param {Object} extraTraitsMap - A mapping of {traitName: fieldId} that gets tracked in addition to the default traits defined
 */

window.identifyForm = function (extraTraitsMap) {
    if (typeof analytics !== 'undefined') {
        /* TODO: Update UTM fields on forms to use IDs so we can record them here */
        var traitsMap = {
            email: "emailAddress",
            firstName: "firstName",
            lastName: "lastName",
            phone: "busPhone",
            title: "title",
            company: "company",
            country: "country",
            state: "stateProv",
        };

        jQuery.extend(traitsMap, extraTraitsMap);

        var traits = {};
        for (var trait in traitsMap) {
            if (!traitsMap.hasOwnProperty(trait)) {
                continue;
            }

            var element = document.getElementById(traitsMap[trait]);
            if (element != null && element.value !== "") {
                traits[trait] = element.value;
            }
        }

        analytics.identify(traits);
    }
};
