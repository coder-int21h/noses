To attach the Zend Framework here using svn externals do this:

svn propset svn:externals "Zend http://framework.zend.com/svn/framework/standard/branches/release-1.7/library/Zend/" .
svn commit -m "added Zend Framework as an external"
svn up



Alternatively, to export a copy here:

svn export http://framework.zend.com/svn/framework/standard/branches/release-1.7/library/Zend/ Zend

