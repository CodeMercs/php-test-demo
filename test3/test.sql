CREATE TABLE `scores` (
  `no` int(80) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `sid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `scores` (`no`, `name`, `sid`) VALUES
(1, 'Pro', 1),
(2, 'Math', 1),
(3, 'Pro', 2),
(4, 'Math', 3),
(5, 'Pro', 4),
(6, 'Math', 4),
(7, 'Pro', 5),
(8, 'Math', 5);

CREATE TABLE `student` (
  `sid` int(80) NOT NULL,
  `birthday` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `student` (`sid`, `birthday`, `name`) VALUES
(1, '19930929', 'Kan'),
(2, '19930928', 'Jun'),
(3, '19930927', 'Jeff'),
(4, '19930926', 'Hao'),
(5, '19930925', 'Cheng');

CREATE TABLE `user` (
  `uid` int(80) NOT NULL,
  `passwd` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `sid` int(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `user` (`uid`, `passwd`, `email`, `sid`) VALUES
(1, '123456', 'A@EE.COM', 1),
(2, '123456', 'B@EE.COM', 2),
(3, '123456', 'C@EE.COM', 3),
(4, '123456', 'D@EE.COM', 4),
(5, '123456', 'E@EE.COM', 5);

ALTER TABLE `scores`
  ADD PRIMARY KEY (`no`),
  ADD KEY `sid` (`sid`);

ALTER TABLE `student`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `sid` (`sid`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);
COMMIT;
